$(document).ready(function() {

    getUsersList() ;
    getActiveUsers() ;

    $('#cameraInfos').click(function() {
        $.ajax({
            url : 'data/getSystemInfo',
            type : 'POST',
            success : function(response, statut){ // success est toujours en place, bien sûr !
                console.log(response) ;
            },

            error : function(resultat, statut, erreur){

            }

          });
    }) ;

    $('#restart').click(function() {      
        $.ajax({
            url : 'data/restartCamera',
            type : 'POST',
            success : function(response, statut){ // success est toujours en place, bien sûr !
                console.log(response) ;
            },

            error : function(resultat, statut, erreur){

            }

          });
    }) ;

    $('#userAccess').click(function() {
        $.ajax({
            url : 'data/getUserAccess',
            type : 'POST',
            success : function(response, statut){ // success est toujours en place, bien sûr !
                console.log(response) ;
            },

            error : function(resultat, statut, erreur){

            }

          });
    }) ;

    $('#imageInfos').click(function() {
        $.ajax({
            url : 'data/getImgInfo',
            type : 'POST',
            success : function(response, statut){ // success est toujours en place, bien sûr !
                console.log(response) ;
            },

            error : function(resultat, statut, erreur){

            }

          });
    }) ;

    $('#addUser').click(function() {
        $.ajax({
            url : 'data/addOneUser',
            data: {
                username: $('#username').val().trim(),
                password: $('#password').val().trim(),
                userPrivilege: $('#userPrivilege option:selected').val()
            },
            type : 'POST',
            success : function(response, statut){ // success est toujours en place, bien sûr !
                console.log(response) ;
                $('#username').val('') ;
                $('#password').val('') ;
                getUsersList() ;
            },

            error : function(resultat, statut, erreur){

            }

          });
    }) ;

}) ;


function getUsersList() {
    var userList = '' ;
    $.ajax({
        url : 'data/getUserList',
        type : 'POST',
        success : function(response, statut){ // success est toujours en place, bien sûr !
            var content = response.split('\r') ;
            
            content.forEach(function(element) {
                if(element.includes('UserName')) {
                    var user = element.split('=')[1] ;
                    userList += '<i class="fa fa-user-o test" aria-hidden="true"></i>' + user + '<br />' ;
                }
            }) ;

            $('#userList').html(userList) ;
        },

        error : function(resultat, statut, erreur){

        }

    });
}

function getActiveUsers() {
    var userList = [] ;
    $.ajax({
        url : 'data/getActiveUsers',
        type : 'POST',
        success : function(response, statut){ // success est toujours en place, bien sûr !
            console.log(response) ;
            var content = response.split('\r') ;
            
            content.forEach(function(element) {
                if(element.includes('UserName')) {
                    var user = element.split('=')[1] ;
                    userList.push(user) ;
                }
            }) ;
        },

        error : function(resultat, statut, erreur){

        }

    });

    return userList ;
}