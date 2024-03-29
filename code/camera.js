var list = [] ;
var imgInfo = [] ;

$(document).ready(function() {
    $('.alert-danger').hide() ;

    getUsersList() ;
    getImgInfo() ;

    $('#authButton').click(function() {
        auth() ;
    }) ;

    $('#cameraInfos').click(function() {
        $.ajax({
            url : 'restController.php?type=getSystemInfo',
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
            url : 'restController.php?type=restartCamera',
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
            url : 'restController.php?type=getUserAccess',
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
            url : 'restController.php?type=getImgInfo',
            type : 'POST',
            success : function(response, statut){ // success est toujours en place, bien sûr !
                $('#requestResult').html(response);
            },

            error : function(resultat, statut, erreur){

            }

          });
    }) ;

    $('#recordBtn').click(function() {
        var temps = $("#time").val();
        $.ajax({
            url : 'restController.php?type=execRecord',
            type : 'POST',
            data : { 
                temps : temps
            },
            success : function(response, statut){ // success est toujours en place, bien sûr !
                console.log(response);
            },

            error : function(resultat, statut, erreur){

            }

          });
    }) ;

    $('#addUser').click(function() {
        $.ajax({
            url : 'restController.php?type=addOneUser',
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
            url : 'restController.php?type=deleteOneUser',
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

    $('#modal-video').click(function() {
        getVideos() ;
    }) ;

    $('#modal-image').click(function() {
        getImages() ;
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

function getVideos() {
    var addContent = '' ;
    var dir = '' ;
    var file = '' ;
    $.ajax({
        url : 'restController.php?type=getVideos',
        type : 'POST',
        success : function(response, statut){ // success est toujours en place, bien sûr !
            var data = JSON.parse(response) ;
            data.forEach(function(element) {
                dir = element ;
                console.log(dir) ;
                file = element.split('/')[1] ;
                console.log(file) ;
                addContent += '<a href="' + dir + '">'+ file + '</a>' + '<br /><br />' ; 
            }) ;
            $('#liste-video').html(addContent) ;
        },

        error : function(resultat, statut, erreur){

        }
    });
}

function getImages() {
    var addContent = '' ;
    var dir = '' ;
    var file = '' ;
    $.ajax({
        url : 'restController.php?type=getImages',
        type : 'POST',
        success : function(response, statut){ // success est toujours en place, bien sûr !
            var data = JSON.parse(response) ;
            data.forEach(function(element) {
                dir = element ;
                console.log(dir) ;
                file = element.split('/')[1] ;
                console.log(file) ;
                addContent += '<a href="' + dir + '">'+ file + '</a>' + '<br /><br />' ; 
            }) ;
            $('#liste-image').html(addContent) ;
        },

        error : function(resultat, statut, erreur){

        }
    });
}

function getImgInfo() {
    $.ajax({
        url : 'restController.php?type=getImgInfo',
        type : 'POST',
        success : function(response, statut){ // success est toujours en place, bien sûr !
            var content = response.split('\r') ;
            content.forEach(function(element, index) {
                switch(index) {
                    case 0 : $('#resolution option[value="'+ element.split('=')[1] + '"]').attr("selected","selected"); ;
                             break ;
                    case 1 : $('#compression option[value="'+ element.split('=')[1] + '"]').attr("selected","selected"); ;
                             break ;
                    case 2 : $('#fps option[value="'+ element.split('=')[1] + '"]').attr("selected","selected"); ;
                             break ;
                    case 4 : $('#luminosite').val(element.split('=')[1]) ;
                             $('#valLuminosite').html($('#luminosite').val()) ;
                             break ;
                    case 5 : $('#contraste').val(element.split('=')[1]) ;
                             $('#valContrast').html($('#contraste').val()) ;
                             break ;
                    case 6 : $('#saturation').val(element.split('=')[1]) ;
                             $('#valSaturation').html($('#saturation').val()) ;
                             break ;
                    case 7 : $('#lightFrequency option[value="'+ element.split('=')[1] + '"]').attr("selected","selected"); ;
                             break ;
                    case 9 : $('#noscintillement option[value="'+ element.split('=')[1] + '"]').attr("selected","selected"); ;
                             break ;
                    

                    default : console.log('erreur') ;
                              break ;
                }
        
            }) ;
        },

        error : function(resultat, statut, erreur){

        }

    });
}

function getUsersList() {
    var userActive = getActiveUsers() ;
    var userList = '' ;
    var deleteUserList = '' ;
    $.ajax({
        url : 'restController.php?type=getUserList',
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
        url : 'restController.php?type=getActiveUsers',
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
        window.location.href = 'indexcamera.php' ;
    }
    else {
        $('.alert-danger').html('Mauvais identifiant') ;
        $('.alert-danger').show() ;
    }

}

function setVideoResolution() {
    var resolution = $('#resolution option:selected').val() ;
    $.ajax({
        url : 'restController.php?type=setVideoResolution',
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
        url : 'restController.php?type=setCompressionRate',
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
        url : 'restController.php?type=setFrameRate',
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
        url : 'restController.php?type=setBrightnessControl',
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
        url : 'restController.php?type=setSaturationControl',
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
        url : 'restController.php?type=setContrastControl',
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
        url : 'restController.php?type=setAntiFlickerEnable',
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
        url : 'restController.php?type=setLightFrequency',
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