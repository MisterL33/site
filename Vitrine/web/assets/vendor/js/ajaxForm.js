/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


 
function ajaxForm(selector) {
//quand le formulaire est soumi
    $(selector).submit( function(event) {
        // Eviter le comportement par défaut (soumettre le formulaire)
        event.preventDefault();
        var $this = $(this);
        //Ici on peut ajouter un loader...
        $.ajax({
            url: $this.attr('action'),
            type: $this.attr('method'),
            data: new FormData( $this[0] ),
            processData: false,
            contentType: false,
            statusCode: {
		//traitement en cas de succès
                200: function(response) {
                    var successMessage = response.successMessage ;
                    //on vide les champs formulaires ou on le supprime ou ...
                    $(selector).trigger("reset");
		    //on retire le loader...
		   //on prévient l'utilistateur du bonne envoi...

                },
                 //traitement en cas d'erreur (on peut aussi traiter le cas erreur 500...)
                412: function(response) {
                    var errorsForm = response.responseJSON.formErrors ;
                    //on affiche les erreurs...
                    });
                }
            }
       });
    };