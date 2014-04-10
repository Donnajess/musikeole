<?php if(!isset($_SESSION['mail'])) { ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Espace membre</h3>
		</div>
		<div class="panel-body">
			<button class="btn btn-primary btn btnConnexion" data-toggle="modal" data-target="#connexion">
				Se connecter
			</button>
			<a href="" data-toggle="modal" data-target="#inscription" class="liensMembresDeco">Devenir membre</a> <br>
			<a href="" data-toggle="modal" data-target="#mdpoublie" class="liensMembresDeco">Mot de passe oublié ?</a>
		</div>
	</div>
<?php } else { ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Espace membre</h3>
		</div>
		<div class="panel-body">
			<a href="" data-toggle="modal" data-target="#changerMdp" class="liensMembresCo">Changer de mot de passe</a>
			<button class="btn btn-primary btn btnDeconnexion" >
				<a href="modeles/gestionMembres/deconnexion.php">Se déconnecter</a>
			</button>
		</div>
	</div>
<?php } ?>	


<div class="modal fade bs-example-modal-sm" id="connexion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm formConnexion">
    	<div class="modal-content">
    		<div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        		<h4 class="modal-title" id="myModalLabel">Connexion</h4>
      		</div>
      		<div class="modal-body">
      			<div style = "display:none;"class = "" id = "notif_connexion"></div> 
        		<form role="form" action="modeles/gestionMembres/connexion.php" method="POST">     
          			<div class="form-group">
                    	<input type="email" class="form-control" id="mail" name="mail" placeholder="Adresse mail">
                    </div>                                        
		          	<div class="form-group">                  
		                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
		            </div> 
		            <div class="form-group">
		            	<button type="submit" class="btn btn-primary" name="connexion" id="connexion" value="connexion" >Se connecter</button>
		            </div>     
	        	</form>
      		</div>
	    </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" id="inscription" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm formInscription">
    	<div class="modal-content">
    		<div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        		<h4 class="modal-title" id="myModalLabel">Devenir adhérent à l'association</h4>
      		</div>
      		<div class="modal-body">
        		<form role="form" action="modeles/gestionMembres/inscriptionMembre.php" method="POST" id="formInscription">     
		          	<div class="form-group">
		            	<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
		            </div>                                        
		          	<div class="form-group">                  
		                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
		            </div>      
		          	<div class="form-group">          
		              	<input type="email" class="form-control" id="mail" name="mail" placeholder="Adresse mail">
		            </div>
		          	<div class="form-group">        
		              	<input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo">
		            </div>
		          	<div class="form-group">  
		             	<input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
		            </div>
		            <div class="form-group">
		            	<input type="password" class="form-control" id="password_verif" name="password_verif" placeholder="Confirmation du mot de passe">
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="btn btn-primary" name="inscriptionM" id="inscriptionM" value="inscriptionM" >Poursuivre l'inscription</button>
		            </div>
		        </form>
		    </div>  		    	
	    </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" id="mdpoublie" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm formMdpOublie">
    	<div class="modal-content">
    		<div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        		<h4 class="modal-title" id="myModalLabel">Mot de passe oublié ?</h4>
      		</div>
      		<div class="modal-body">
        		<form role="form" action="modeles/gestionMembres/mdpOublie.php" method="POST" id="formMdpOublie">   
		          	<div class="form-group">        
		              	<input type="email" class="form-control" id="mail" name="mail" placeholder="Saisissez votre adresse mail">
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="btn btn-primary" name="mdpOublie" id="mdpOublie" value="mdpOublie" >Réinitialiser mon mot de passe</button>
		            </div>
		        </form>
		    </div>  		    	
	    </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" id="changerMdp" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm formChangerMdp">
    	<div class="modal-content">
    		<div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        		<h4 class="modal-title" id="myModalLabel">Changer de mot de passe</h4>
      		</div>
      		<div class="modal-body">
        		<form role="form" action="modeles/gestionMembres/changerMdp.php" method="POST" id="formChangerMdp">   
		          	<div class="form-group">        
		              	<input type="password" class="form-control" id="ancienMdp" name="ancienMdp" placeholder="Ancien mot de passe">
		            </div>
		            <div class="form-group">        
		              	<input type="password" class="form-control" id="nouveauMdp" name="nouveauMdp" placeholder="Nouveau mot de passe">
		            </div>
		            <div class="form-group">        
		              	<input type="password" class="form-control" id="confirmMdp" name="confirmMdp" placeholder="Retappez le nouveau mot de passe">
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="btn btn-primary" name="changerMdp" id="changerMdp" value="changerMdp" >Valider</button>
		            </div>
		        </form>
		    </div>  		    	
	    </div>
    </div>
</div>