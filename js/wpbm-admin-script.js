(function($) {

    /**
     * Add blog functionality
     */
    $(function() {

        /*
         * Fetch list of taxonomy from post type
         */
        $('.wpbm-post-type').on('change', function() {
            var select_post = $(this).val();
            $.ajax({
                url: wpbm_backend_js_params.ajax_url,
                data: {
                    select_post: select_post,
                    _wpnonce: wpbm_backend_js_params.ajax_nonce,
                    action: 'wpbm_selected_post_taxonomy',
                    beforeSend: function() {
                        // $(".wpbm-loader-preview").show();
                    }
                },
                type: "POST",
                success: function(response) {
                    $(".wpbm-select-taxonomy").html(response);
                    $(".wpbm-filter-taxonomy").html(response);
//                    $(".wpbm-loader-preview").hide();
                }
            });
        });
        /*
         * Fetch list of terms from taxonomy
         */
        $('.wpbm-select-taxonomy').on('change', function() {
            var select_tax = $(this).val();
            //  var tax_type = $('.wpbm-taxonomy-queries-type').val();
            $.ajax({
                url: wpbm_backend_js_params.ajax_url,
                data: {
                    select_tax: select_tax,
                    // tax_type: tax_type,
                    _wpnonce: wpbm_backend_js_params.ajax_nonce,
                    action: 'wpbm_selected_taxonomy_terms',
                    beforeSend: function() {
                        // $(".wpbm-loader-preview").show();
                    }
                },
                type: "POST",
                success: function(response) {
                    $(".wpbm-simple-taxonomy-term").html(response);
//                    $(".wpbm-loader-preview").hide();

                }
            });
        });


        //radio button show and hide for button link
        $('body').on('click', '.wpbm-select-post-link', function() {
            var value = $(this).val();
            if (value === 'post_link')
            {
                $(this).closest('.wpbm-blog-wrap').find('.wpbm-custom-link').hide();
            } else
            {
                $(this).closest('.wpbm-blog-wrap').find('.wpbm-custom-link').show();
            }
        });


        /*
         * Menu Tab
         */
        $('.wpbm-tab-tigger').click(function() {
            $('.wpbm-tab-tigger').removeClass('wpbm-active');
            $(this).addClass('wpbm-active');
            var active_tab_key = $('.wpbm-tab-tigger.wpbm-active').data('menu');
            $('.wpbm-settings-wrap').removeClass('wpbm-active-container');
            $('.wpbm-settings-wrap[data-menu-ref="' + active_tab_key + '"]').addClass('wpbm-active-container');
        });

        /*
         * Usage Tab
         */
        $('.wpbm-usage-trigger').click(function() {
            $('.wpbm-usage-trigger').removeClass('wpbm-usage-active');
            $(this).addClass('wpbm-usage-active');
            var active_tab_key = $('.wpbm-usage-trigger.wpbm-usage-active').data('usage');
            $('.wpbm-usage-post').hide();
            $('.wpbm-usage-post[data-usage-ref="' + active_tab_key + '"]').show();
        });
        /*
         * Checked button for metadata
         */

        $('.wpbm-show-category').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-show-tag').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-show-author').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-show-comment').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-show-date').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wpbm-date-wrapper').show();
            } else
            {
                $(this).val('0');
                $('.wpbm-date-wrapper').hide();
            }
        });
        $('.wpbm-show-read-more').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wpbm-read-more-wrap').show();
            } else
            {
                $(this).val('0');
                $('.wpbm-read-more-wrap').hide();
            }
        });

        $('.wpbm-show-custom-relation').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wpbm-relation-main-wrap').show();
            } else
            {
                $(this).val('0');
                $('.wpbm-relation-main-wrap').hide();
            }
        });


        /*
         *  Social media share checked value
         */

        $('.wpbm-show-facebook-share').click(function() {
            if ($(this).is(':checked'))
            {
                $('.wpbm-show-facebook-value').val('1');
            } else
            {
                $('.wpbm-show-facebook-value').val('0');
            }
        });
        $('.wpbm-show-twitter-share').click(function() {
            if ($(this).is(':checked'))
            {
                $('.wpbm-show-twitter-value').val('1');
            } else
            {
                $('.wpbm-show-twitter-value').val('0');
            }
        });
        $('.wpbm-show-google-share').click(function() {
            if ($(this).is(':checked'))
            {
                $('.wpbm-show-google-value').val('1');
            } else
            {
                $('.wpbm-show-google-value').val('0');
            }
        });
        $('.wpbm-show-linkedin-share').click(function() {
            if ($(this).is(':checked'))
            {
                $('.wpbm-show-linkedin-value').val('1');
            } else
            {
                $('.wpbm-show-linkedin-value').val('0');
            }
        });
        $('.wpbm-show-mail-share').click(function() {
            if ($(this).is(':checked'))
            {
                $('.wpbm-show-mail-value').val('1');
            } else
            {
                $('.wpbm-show-mail-value').val('0');
            }
        });

        /*
         * Show && hide layout settings
         */
        $('.wpbm-select-layout').change(function() {
            if ($(this).val() === "grid")
            {
                $('.wpbm-grid-setting-wrap').show();
                $('.wpbm-list-setting-wrap').hide();
                $('.wpbm-slider-setting-wrap').hide();
                $('.wpbm-slider-option-block').hide();

            } else if ($(this).val() === "list") {
                $('.wpbm-list-setting-wrap').show();
                $('.wpbm-slider-setting-wrap').hide();
                $('.wpbm-grid-setting-wrap').hide();
                $('.wpbm-slider-option-block').hide();
            } else
            {
                $('.wpbm-list-setting-wrap').hide();
                $('.wpbm-slider-setting-wrap').show();
                $('.wpbm-grid-setting-wrap').hide();
                $('.wpbm-slider-option-block').show();
            }
        });
        var layout_type = $(".wpbm-select-layout option:selected").val();
        if (layout_type === "grid")
        {
            $('.wpbm-grid-setting-wrap').show();
            $('.wpbm-list-setting-wrap').hide();
            $('.wpbm-slider-setting-wrap').hide();
            $('.wpbm-slider-option-block').hide();

        } else if (layout_type === "list") {
            $('.wpbm-list-setting-wrap').show();
            $('.wpbm-slider-setting-wrap').hide();
            $('.wpbm-grid-setting-wrap').hide();
            $('.wpbm-slider-option-block').hide();
        } else
        {
            $('.wpbm-list-setting-wrap').hide();
            $('.wpbm-slider-setting-wrap').show();
            $('.wpbm-grid-setting-wrap').hide();
            $('.wpbm-slider-option-block').show();
        }
        /*
         * Show && hide orderby meta keys
         */
        $('.wpbm-select-orderby').change(function() {
            if ($(this).val() === "meta_value" || $(this).val() === "meta_value_num")
            {
                $('.wpbm-orderby-meta-warp').show();
            } else {
                $('.wpbm-orderby-meta-warp').hide();
            }
        });
        var orderby_type = $(".wpbm-select-orderby option:selected").val();
        if (orderby_type === "meta_value" || orderby_type === "meta_value_num") {
            $('.wpbm-orderby-meta-warp').show();
        } else {
            $('.wpbm-orderby-meta-warp').hide();
        }


        //radio button show and hide for meta keys
        $('.wpbm-meta-key-type').click(function() {
            var value = $(this).val();
            if (value === 'pre-available') {
                $('.wpbm-pre-meta-key-wrap').show();
                $('.wpbm-other-meta-wrap').hide();
            } else {
                $('.wpbm-pre-meta-key-wrap').hide();
                $('.wpbm-other-meta-wrap').show();
            }
        });
        //radio button show and hide for meta keys
        $('.wpbm-post-content').click(function() {
            var value = $(this).val();
            if (value === 'full-text') {
                $('.wpbm-excerpt-wrap').hide();
            } else {
                $('.wpbm-excerpt-wrap').show();
            }
        });



        /**
         * Jquery UI Slider initialization
         *
         * @since 1.0.0
         */

        $('.wpbm-grid-column').each(function() {
            var $selector = $(this);
            var min = $(this).data('min');
            var max = $(this).data('max');
            var value = $(this).data('value');
            $(this).slider({
                range: 'min',
                min: min,
                max: max,
                value: value,
                slide: function(event, ui) {
                    $selector.parent().find('input[type="number"]').val(ui.value);
                    console.log(event);
                    console.log(ui);
                }
            });
        });

//radio button show and hide for post type's post
        $('.wpbm-post-link').click(function() {
            var value = $(this).val();
            if (value == 'post_link') {
                $('.wpbm-custom-link-wrap').hide();
            } else {
                $('.wpbm-custom-link-wrap').show();
            }
        });


        $('.wpbm-show-social-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wpbm-social-container').show();
            } else
            {
                $(this).val('0');
                $('.wpbm-social-container').hide();
            }
        });
        $('.wpbm-show-facebook-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-show-twitter-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-show-google-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-show-linkedin-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-show-mail-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-show-pinterest-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });


        /*
         * Template preview
         */
        //grid template preview
        $(".wpbm-grid-common").first().addClass("grid-active");
        $('.wpbm-grid-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.wpbm-grid-common').hide();
            $('#wpbm-grid-demo-' + current_id).show();
        });
        if ($(".wpbm-grid-template option:selected").length > 0) {
            var grid_view = $(".wpbm-grid-template option:selected").val();
            var array_break = grid_view.split('-');
            var current_id1 = array_break[1];
            $('.wpbm-grid-common').hide();
            $('#wpbm-grid-demo-' + current_id1).show();
        }




        //list preview
        $(".wpbm-list-common").first().addClass("list-active");
        $('.wpbm-list-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.wpbm-list-common').hide();
            $('#wpbm-list-demo-' + current_id).show();
        });
        if ($(".wpbm-list-template option:selected").length > 0) {
            var grid_view = $(".wpbm-list-template option:selected").val();
            var array_break = grid_view.split('-');
            var current_id1 = array_break[1];
            $('.wpbm-list-common').hide();
            $('#wpbm-list-demo-' + current_id1).show();
        }

        //Slider preview
        $(".wpbm-slider-common").first().addClass("slider-active");
        $('.wpbm-slider-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.wpbm-slider-common').hide();
            $('#wpbm-slider-demo-' + current_id).show();
        });
        if ($(".wpbm-slider-template option:selected").length > 0) {
            var list_view = $(".wpbm-slider-template option:selected").val();
            var array_break = list_view.split('-');
            var current_id1 = array_break[1];
            $('.wpbm-slider-common').hide();
            $('#wpbm-slider-demo-' + current_id1).show();
        }


    });
}(jQuery));
