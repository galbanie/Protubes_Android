<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompteManager
 *
 * @author galbanie
 */
class CompteManager extends DAO{
    
    public function __construct(PDO $bd) {
        $this->setBd($bd);
    }
    
    public function add($objet) {
        try {
             $sql = "INSERT INTO compte SET
                     actif = :actif, newsletter = :news,langueDefault = :lang,
                     confidentialiteDefault = :conf, permettreRechercheMembre = :permRech,
                     idUsager = :idU";
            /* @var $requete PDOStatement */
            $requete = $this->bd->prepare($sql);
            $requete->bindValue(':actif',$objet->isActif(),PDO::PARAM_BOOL);
            $requete->bindValue(':news',$objet->isNewsletter(),PDO::PARAM_BOOL);
            $requete->bindValue(':lang',$objet->getLangueDefault());
            $requete->bindValue(':conf',$objet->getConfidentialiteDefault());
            $requete->bindValue(':permRech',$objet->isPermettreRechercheMembre());
            $requete->bindValue(':idU',$objet->getIdUsager());

            $requete->execute();
            return $this->bd->lastInsertId();
        } catch (Exception $e) {
            TraceErreur::ecrireLog('./log.txt',$e->getTraceAsString(),"CompteManager", true);
            return false;
        }
    }

    public function countRows() {
        try {
            $requete = $this->bd->query("SELECT COUNT(*) AS nb_total FROM compte");
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
            $rows = (int)$resultat['nb_total'];
            return $rows;
        } catch (Exception $e) {
            TraceErreur::ecrireLog('./log.txt',$e->getTraceAsString(),"CompteManager", true);
            return false;
        }
    }

    public function delete($colonne, $value) {
        try {
            $requete = $this->bd->prepare("DELETE FROM compte WHERE ".$colonne." = :colonne");
            $requete->execute(array(':colonne' => $value ));
            return true;
        } catch (Exception $e) {
            TraceErreur::ecrireLog('./log.txt',$e->getTraceAsString(),"CompteManager", true);
            return false;
        }
    }

    public function get($colonne, $value, $method) { /* 
    												$method = sert à préciser le type de renvoie de la méthode 
    												il y a deux types de renvoies maintenant : 
    												a) Si le parametre est '0' (zéro) : La méthode renvoie un $compte normal.
    												b) Si le parametre est '1' : La méthode renvoie un $compte de type JSON pour Android. 
    	*/
        try {
        	if ($method == 0){
            	$requete = $this->bd->prepare("SELECT * FROM compte WHERE ".$colonne." = :colonne");
            	$requete->execute(array(':colonne' => $value));			
            	$resultat = $requete->fetch(PDO::FETCH_ASSOC);

           	 	if($resultat){
                	$compte = new Compte();
                	$compte->setTableauDonnees($resultat);			
                	$requete->closeCursor();
                	return $compte;
             	}
             }else if ($method == 1){
             	$request = "SELECT * FROM compte WHERE ".$colonne." = :colonne");
             	$request->execute(array(':colonne' => $value));	
             	$obj = $requete->fetch(PDO::FETCH_ASSOC);
             	$json_obj = json_encode($obj); 
             	return $json_obj; 
             }			
            //$requete>closeCursor();
            return false;
        } catch (Exception $e) {
            TraceErreur::ecrireLog('./log.txt',$e->getTraceAsString(),"CompteManager", true);
            return false;
        }
    }

    public function getList($colonne, $value) {
        try {
            $liste = new Liste();
            $requete = $this->bd->prepare("SELECT * FROM compte WHERE ".$colonne." = :colonne");
            $requete->execute( array( ':colonne' => $value ) );			
            while ($donnee = $requete->fetch(PDO::FETCH_ASSOC)){
                $compte = new Compte();
                $compte->setTableauDonnees($donnee);
                $liste->add($compte);
            }
            return $liste;
        } catch (Exception $e) {
            TraceErreur::ecrireLog('./log.txt',$e->getTraceAsString(),"CompteManager", true);
            return false;
        }
    }

    public function getListAll($method) {/* 
    												$method = sert à préciser le type de renvoie de la méthode 
    												il y a deux types de renvoies maintenant : 
    												a) Si le parametre est '0' (zéro) : La méthode renvoie une $liste normale.
    												b) Si le parametre est '1' : La méthode renvoie une $liste de type JSON pour Android. 
    	*/
        	try {
    		if ($method == 0){
            	$liste = new Liste();
            	$requete = $this->bd->query("SELECT * FROM compte");
            	while ($donnee = $requete->fetch(PDO::FETCH_ASSOC)){
                	$compte = new Compte();
                	$compte->setTableauDonnees($donnee);
                	$liste->add($compte);
            	}
            }else if ($method == 1 ){
            	$request = $this->bd->query("SELECT * FROM compte"); 
            	$obj = $request->fetchAll(); 
            	$jsonObj = json_encode($obj); 
            	return $jsonObj; 
            }
            	return $liste;
        	} catch (Exception $e) {
            TraceErreur::ecrireLog('./log.txt',$e->getTraceAsString(),"CompteManager", true);
            return false;
        }
    }

    public function getListAllLimit($limitStart, $pagination) {
        try {
            $liste = new Liste();
            $requete = $this->bd->query("SELECT * FROM compte LIMIT ".$limitStart.",".$pagination);
            while ($donnee = $requete->fetch(PDO::FETCH_ASSOC)){
                $compte = new Compte();
                $compte->setTableauDonnees($donnee);
                $liste->add($compte);
            }
            return $liste;
        } catch (Exception $e) {
            TraceErreur::ecrireLog('./log.txt',$e->getTraceAsString(),"CompteManager", true);
            return false;
        }
    }

    public function getListLimit($colonne, $value, $limitStart, $pagination) {
        try {
            $liste = new Liste();
            $requete = $this->bd->query("SELECT * FROM compte WHERE $colonne = $value LIMIT ".$limitStart.",".$pagination);
            while ($donnee = $requete->fetch(PDO::FETCH_ASSOC)){
                $compte = new Compte();
                $compte->setTableauDonnees($donnee);
                $liste->add($compte);
            }
            return $liste;
        } catch (Exception $e) {
            TraceErreur::ecrireLog('./log.txt',$e->getTraceAsString(),"CompteManager", true);
            return false;
        }
    }

    public function update(\Observable $subject, $arg = null) {
        try {
             $sql = "UPDATE compte SET
                     actif = :actif, newsletter = :news,langueDefault = :lang,
                     confidentialiteDefault = :conf, permettreRechercheMembre = :permRech,
                     idUsager = : WHERE id = :id";
            /* @var $requete PDOStatement */
            $requete = $this->bd->prepare($sql);
            $requete->bindValue(':actif',$objet->isActif(),PDO::PARAM_BOOL);
            $requete->bindValue(':news',$objet->isNewsletter(),PDO::PARAM_BOOL);
            $requete->bindValue(':lang',$objet->getLangueDefault());
            $requete->bindValue(':conf',$objet->getConfidentialiteDefault());
            $requete->bindValue(':permRech',$objet->isPermettreRechercheMembre());
            $requete->bindValue(':idU',$objet->getIdUsager());

            $requete->execute();
            return $this->bd->lastInsertId();
        } catch (Exception $e) {
            TraceErreur::ecrireLog('./log.txt',$e->getTraceAsString(),"CompteManager", true);
            return false;
        }
    }
}

?>
