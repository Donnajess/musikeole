<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Espace membre</h3>
	</div>
	<div class="panel-body">
		<button class="btn btn-primary btn btnConnexion" data-toggle="modal" data-target="#connexion">
			Se connecter
		</button>
		<a href="" data-toggle="modal" data-target="#inscription">Devenir membre</a>
	</div>
</div>


<div class="modal fade bs-example-modal-sm" id="connexion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm formConnexion">
    	<div class="modal-content">
    		<div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        		<h4 class="modal-title" id="myModalLabel">Connexion</h4>
      		</div>
      		<div class="modal-body">
        		<form role="form" action="" method="POST">     
          			<div class="form-group">
                    	<input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Identifiant">
                    </div>                                        
		          	<div class="form-group">                  
		                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
		            </div>      
	        	</form>
      		</div>
	      	<div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
		        <button type="button" class="btn btn-primary" name="connexion" id="connexion" value="connexion" >Se connecter</button>
	      	</div>
	    </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" id="inscription" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm formInscription">
    	<div class="modal-content">
    		<div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        		<h4 class="modal-title" id="myModalLabel">Devenir membre</h4>
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