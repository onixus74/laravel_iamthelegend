$(document).ready(function () {

    $('.comment-form').on('keydown', function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            $(this).submit();
        }
    });

    $('.leader').select2({
        placeholder: "Select a user to be the captain "
    });


    $(".scroller").each(function() {

        var height;

        if ($(this).attr("data-height")) {
            height = $(this).attr("data-height");
        } else {
            height = $(this).css('height');
        }

        $(this).slimScroll({
            allowPageScroll: true, // allow page scroll when the element scroll is ended
            size: '7px',
            color: ($(this).attr("data-handle-color") ? $(this).attr("data-handle-color") : '#bbb'),
            wrapperClass: ($(this).attr("data-wrapper-class") ? $(this).attr("data-wrapper-class") : 'slimScrollDiv'),
            railColor: ($(this).attr("data-rail-color") ? $(this).attr("data-rail-color") : '#eaeaea'),
            position: 'right',
            height: height,
            alwaysVisible: ($(this).attr("data-always-visible") == "1" ? true : false),
            railVisible: ($(this).attr("data-rail-visible") == "1" ? true : false),
            disableFadeOut: true
        });

        $(this).attr("data-initialized", "1");
    });



    /*function repoFormatResult( user ) {
        var gravatarLink = "//www.gravatar.com/avatar/" + md5(user.email) + "?&d=identicon";
        var markup = "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__avatar'><img src='" + gravatarLink + "' /></div>" +
            "<div class='select2-result-repository__meta'>" +
            "<div class='select2-result-repository__title'>" + user.name + "</div>";
        /*if ( repo.description ) {
            markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
        }
        markup += "<div class='select2-result-repository__statistics'>" +
            "<div class='select2-result-repository__forks'><span class='glyphicon glyphicon-flash'></span> " + repo.forks_count + " Forks</div>" +
            "<div class='select2-result-repository__stargazers'><span class='glyphicon glyphicon-star'></span> " + repo.stargazers_count + " Stars</div>" +
            "<div class='select2-result-repository__watchers'><span class='glyphicon glyphicon-eye-open'></span> " + repo.watchers_count + " Watchers</div>" +
            "</div>" +
            "</div></div>";
        return markup;
    }
    function repoFormatSelection( user ) {
        return user.name;
    }
    $( ".select2-remote" ).select2({
        placeholder: "Select a user to add to the team",
        minimumInputLength: 1,
        ajax: {
            url: "http://localhost:8000/api/users",
            dataType: "json",
            method: "get",
            data: function( term, page ) {
                return {
                    q: term
                };
            },
            results: function( data, page ) {
                // parse the results into the format expected by Select2.
                // since we are using custom formatting functions we do not need to alter the remote JSON data
                return { results: data.items };
            },
            cache: true
        },
        initSelection: function( element, callback ) {
            // the input tag has a value attribute preloaded that points to a preselected repository's id
            // this function resolves that id attribute to an object that select2 can render
            // using its formatResult renderer - that way the repository name is shown preselected
            var id = $( element ).val();
            if ( id !== "" ) {
                $.ajax( "https://api.github.com/repositories/" + id, {
                    dataType: "json"
                }).done( function( data ) {
                    callback( data );
                });
            }
        },
        formatResult: repoFormatResult,
        formatSelection: repoFormatSelection,
        // apply css that makes the dropdown taller
        dropdownCssClass: "bigdrop",
        // we do not want to escape markup since we are displaying html in results
        escapeMarkup: function( m ) {
            return m;
        }
    });
    $( "button[data-select2-open]" ).click( function() {
        $( "#" + $( this ).data( "select2-open" ) ).select2( "open" );
    });

    var select2OpenEventName = "select2-open";
    $( ":checkbox" ).on( "click", function() {
        $( this ).parent().nextAll( "select" ).select2( "enable", this.checked );
    });

    $( ".select2-remote" ).on( select2OpenEventName, function() {
        if ( $( this ).parents( "[class*='has-']" ).length ) {
            var classNames = $( this ).parents( "[class*='has-']" )[ 0 ].className.split( /\s+/ );
            for ( var i = 0; i < classNames.length; ++i ) {
                if ( classNames[ i ].match( "has-" ) ) {
                    $( "#select2-drop" ).addClass( classNames[ i ] );
                }
            }
        }
    });*/



});