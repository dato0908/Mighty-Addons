(function ($) {

    var WidgetMailchimpHandler = function ( $scope, $ ) {
        var sel = $scope.find( '.mighty-maichimp-form' );
        var mcList = sel.data( 'mclist' );
        var successMsg = sel.data( 'success-msg' );
        var errorMsg = sel.data( 'error-msg' );
        var submitAction = sel.data( 'after-submission' );
        var buttonText = sel.data( 'button-text' );
        var loadingText = sel.data( 'loading-text' );
        if ( submitAction == "different" ) {
            var link = sel.data( 'link' );
            var external = sel.data( 'external' );
            var nofollow = sel.data( 'nofollow' );
        }
        var form = sel[0];

        $( form ).on( 'submit', function( e ) {
            e.preventDefault();
            $(this).find('.mailchimp-submit .mt-form-control').text(loadingText);
            var data = $( form ).find( 'input' ).serialize() + "&list=" + mcList;
            $.ajax({
                url: MightyAddons.ajaxUrl,
                type: 'post',
                data: {
                    action: MightyAddons.mailchimpAction,
                    fields: data,
                },
                success: function() {
                    if ( submitAction == "different" ) {
                        if ( external ) {
                            window.open(link, '_blank');
                        } else {
                            window.location = link;
                        }
                    }
                    
                    if ( $( form ).find('.mailchimp-message').length ) {
                        $( form ).find('.mailchimp-message').text( successMsg );
                    } else {
                        $( form ).append('<p class="mailchimp-message mailchimp-success">' + successMsg + '</p>');
                    }

                    $( form ).find('.mailchimp-submit .mt-form-control').text(buttonText);

                    // Clearing after submission
                    $( form ).find('input').val('');
                },
                error: function() {
                    $( form ).append('<p class="mailchimp-message mailchimp-error">' + errorMsg + '</p>');
                }
            });
            setTimeout( () => {
                $( form ).find('.mailchimp-message').remove();
            }, 5000 );
        });
    };

    // Make sure you run this code under Elementor.
    $(window).on( 'elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/mt-mailchimp.default', WidgetMailchimpHandler );
    });
})(jQuery);