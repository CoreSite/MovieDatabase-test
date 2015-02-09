
var csMovie = '';

(function ($) {

    $(function () {

        csMovie.initForm($('#add_movie'));
        csMovie.initPagination();
        csMovie.getList($('.movie_list').data('url'), 1);

    });

    function CSMovies()
    {

        this.initForm       = function(form)
        {
            $(form).validate({
                submitHandler: function(form)
                {
                    csMovie.sendForm(form);
                },
                errorPlacement: function()
                {

                },
                highlight: function(element, errorClass)
                {
                    $(element).parent().addClass('has-error');
                },
                unhighlight : function(element, errorClass, validClass)
                {
                    $(element).parent().removeClass('has-error');
                }
            });
        }

        this.initPagination = function()
        {
            $(document).on('click', '.pagination a', function() {
                csMovie.getList($('.movie_list').data('url'), $(this).data('page'));
            });

        }

        this.sendForm       = function(form)
        {
            $(form).ajaxSubmit({
                'type': 'POST',
                'dataType': 'json',
                'data': {},
                'beforeSubmit': function(arr, $form, options)
                {


                },
                'success': function(data, statusText, xhr, form)
                {
                    if(data.success != undefined && data.success == true)
                    {
                        csMovie.getList($('.movie_list').data('url'), 1);
                    }
                    else
                    {
                        if(data.errors != undefined && Object.prototype.toString.call(data.errors) == '[object Object]')
                        {
                            for(var fieldName in data.errors)
                            {
                                $('#' + $(form).attr('name') + '_' + fieldName).parent().addClass('has-error');
                            }
                        }
                    }
                },
                'error': function() {

                }
            });
        }

        this.getList        = function(url, page)
        {
            $.ajax({
                'type'      : 'POST',
                'url'       : url,
                'dataType'  : 'html',
                'data'      : {
                    'page' : page
                },
                'success': function(html)
                {
                    $('.movie_list').html(html);
                }
            });
        }

    }

    csMovie = new CSMovies();

})(jQuery);