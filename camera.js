var list = [] ;

$(document).ready(function() {
    $('.alert-danger').hide() ;

    getUsersList() ;

    $('#authButton').click(function() {
        auth() ;
    }) ;

    $('#cameraInfos').click(function() {
        $.ajax({
            url : 'data/getSystemInfo',
            type : 'POST',
            success : function(response, statut){ // success est toujours en place, bien sûr !
                $('#requestResult').html(response);
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
                $('#requestResult').html(response);
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
                $('#requestResult').html(response);
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
                $('#requestResult').html(response);
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

    $('#deleteUser').click(function() {
        $.ajax({
            url : 'data/deleteOneUser',
            data: {
                username: $('#users option:selected').val(),
            },
            type : 'POST',
            success : function(response, statut){ // success est toujours en place, bien sûr !
                console.log(response) ;
                getUsersList() ;
            },

            error : function(resultat, statut, erreur){

            }

          });
    }) ;

    $('#resolution').change(function() {
        setVideoResolution() ;
    }) ;

    $('#compression').change(function() {
        setCompressionRate() ;
    }) ;

    $('#fps').change(function() {
        setFramenRate() ;
    }) ;

    $(document).on('input','#luminosite', function() {
        $('#valLuminosite').html($('#luminosite').val()) ;
        setBrightnessControl() ;
    }) ;

    $(document).on('input','#saturation', function() {
        $('#valSaturation').html($('#saturation').val()) ;
        setSaturationControl() ;
    }) ;

    $(document).on('input','#contraste', function() {
        $('#valContrast').html($('#contraste').val()) ;
        setContrastControl() ;
    }) ;

    $('#noscintillement').change(function() {
        setAntiFlickerEnable() ;
    }) ;

    $('#lightFrequency').change(function() {
        setLightFrequency() ;
    }) ;

}) ;


function getUsersList() {
    var userActive = getActiveUsers() ;
    var userList = '' ;
    var deleteUserList = '' ;
    $.ajax({
        url : 'data/getUserList',
        type : 'POST',
        success : function(response, statut){ // success est toujours en place, bien sûr !
            var content = response.split('\r') ;
            list = content ;
            if(list.length == 0) {
                console.log('caméra branché ?') ;
            }
            content.forEach(function(element) {
                if(element.includes('UserName')) {
                    var user = element.split('=')[1] ;
                    deleteUserList += '<option value="' + user + '">' + user + '</option>' ;
                    if(userActive.includes(user)) {
                        userList += '<i class="fa fa-user-o fa-user-active" aria-hidden="true"></i>' + user + '<br />' ;
                    }
                    else {
                        userList += '<i class="fa fa-user-o" aria-hidden="true"></i>' + user + '<br />' ;
                    }
                }
            }) ;
            $('#users').html(deleteUserList) ;
            $('#userList').html(userList) ;
        },

        error : function(resultat, statut, erreur){

        }

    });
    return list ;
}

function getActiveUsers() {
    var userList = [] ;
    $.ajax({
        url : 'data/getActiveUsers',
        type : 'POST',
        success : function(response, statut){ // success est toujours en place, bien sûr !
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
    console.log(userList) ;
    return userList ;
}

function auth() {
    var username =  $('#username').val() ;
    var password = $('#motdepasse').val() ;
    var userList = getUsersList() ;
    var users = [] ;
    var pass = [] ;
    var indexUser = 0 ;

    userList.forEach(function(element) {
        if(element.includes('UserName')) {
            users.push(element.split('=')[1]) ;
        }
        else if(element.includes('UserPassword')) {
            pass.push(element.split('=')[1])
        }
    }) ;

    indexUser = users.indexOf(username) ;

    if(password == pass[indexUser]) {
        window.location.href = '/indexcamera.php' ;
    }
    else {
        $('.alert-danger').html('Mauvais identifiant') ;
        $('.alert-danger').show() ;
    }

}

function setVideoResolution() {
    var resolution = $('#resolution option:selected').val() ;
    $.ajax({
        url : 'data/setVideoResolution',
        type : 'POST',
        data : {
            resolution : resolution
        },
        success : function(response, statut){ // success est toujours en place, bien sûr !
            console.log(response) ;
        },

        error : function(resultat, statut, erreur){

        }

    });
}

function setCompressionRate() {
    var compression = $('#compression option:selected').val() ;
    $.ajax({
        url : 'data/setCompressionRate',
        type : 'POST',
        data : {
            compressionRate : compression
        },
        success : function(response, statut){ // success est toujours en place, bien sûr !
            console.log(response) ;
        },

        error : function(resultat, statut, erreur){

        }

    });
}

function setFramenRate() {
    var fps = $('#fps option:selected').val() ;
    $.ajax({
        url : 'data/setFrameRate',
        type : 'POST',
        data : {
            frameRate : fps
        },
        success : function(response, statut){ // success est toujours en place, bien sûr !
            console.log(response) ;
        },

        error : function(resultat, statut, erreur){

        }

    });
}

function setBrightnessControl() {
    var luminosite = $('#luminosite').val() ;
    $.ajax({
        url : 'data/setBrightnessControl',
        type : 'POST',
        data : {
            brightnessControl : luminosite
        },
        success : function(response, statut){ // success est toujours en place, bien sûr !
            console.log(response) ;
        },

        error : function(resultat, statut, erreur){

        }

    });
}

function setSaturationControl() {
    var saturation = $('#saturation').val() ;
    $.ajax({
        url : 'data/setSaturationControl',
        type : 'POST',
        data : {
            saturationControl : saturation
        },
        success : function(response, statut){ // success est toujours en place, bien sûr !
            console.log(response) ;
        },

        error : function(resultat, statut, erreur){

        }

    }) ;
}

function setContrastControl() {
    var contraste = $('#contraste').val() ;
    $.ajax({
        url : 'data/setContrastControl',
        type : 'POST',
        data : {
            contrastControl : contraste
        },
        success : function(response, statut){ // success est toujours en place, bien sûr !
            console.log(response) ;
        },

        error : function(resultat, statut, erreur){

        }

    }) ;
}

function setAntiFlickerEnable() {
    var scintillement = $('#noscintillement option:selected').val() ;
    $.ajax({
        url : 'data/setAntiFlickerEnable',
        type : 'POST',
        data : {
            antiFlickerEnable : scintillement
        },
        success : function(response, statut){ // success est toujours en place, bien sûr !
            console.log(response) ;
        },

        error : function(resultat, statut, erreur){

        }

    });
}

function setLightFrequency() {
    var lightFrequency = $('#lightFrequency option:selected').val() ;
    $.ajax({
        url : 'data/setLightFrequency',
        type : 'POST',
        data : {
            lightFrequency : lightFrequency
        },
        success : function(response, statut){ // success est toujours en place, bien sûr !
            console.log(response) ;
        },

        error : function(resultat, statut, erreur){

        }

    });
}