 $(document).ready(function(){
            $("body").on('click', '.enroll_course', function(e) {
                current_course = this;
                jQuery.post('ajax_controller.php', {
                    action: 'add_sem_course',
                    sem_type: $('#sem_type').attr('sem_type'),
                    course_id: $(this).attr('course_id'),
                    user_id: $('#user_id').attr('user_id'),
                }, function(data) {
                    // console.log(data);
                    var data = jQuery.parseJSON(data);
                    if (data.success) {
                        $('#success_course_message').html(data.success);
                        $('#failed_course_message').html('');
                        var str = $(current_course).parents('tr').html().replace("enroll_course", "disenroll");
                        var str = str.replace("Enroll", "Disenroll");
                        $('#enrolled_courses_table tbody').append("<tr>"+str+"</tr>");
                        $('.no_enroll_course').remove();
                        $(current_course).parents('tr').fadeOut();
                    } else if (data.error) {
                        $('#success_course_message').html('');
                        $('#failed_course_message').html(data.error);
                    }
                });
            });
            $("body").on('click', '.disenroll', function(e) {
                current_course = this;
                jQuery.post('ajax_controller.php', {
                    action: 'remove_sem_course',
                    sem_type: $('#sem_type').attr('sem_type'),
                    course_id: $(this).attr('course_id'),
                    user_id: $('#user_id').attr('user_id'),
                }, function(data) {
                    $(current_course).parents('tr').fadeOut();
                    var data = jQuery.parseJSON(data);
                    var str = $(current_course).parents('tr').html().replace("disenroll", "enroll_course");
                    var str = str.replace("Disenroll", "Enroll");
                    $('#enroll_courses_table tbody').append("<tr>"+str+"</tr>");
                    $('.no_course').remove();
                });
            });
        });