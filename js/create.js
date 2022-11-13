$(document).ready(function () {
    
    questionType = function (scope) {
        var val = $(scope).val();
        var answers = $(scope).parents('.repeater-container').find('.answer-container');
        answers.each((index, element) => {
            var dom = $(element);
            if(dom.attr('class').includes(val)){
                dom.show();
            } else {
                dom.hide();
            }
        });
    }

    $('#quiz_form').on('submit', function(event){
        var count_data = 0;
        $('.questName').each(function(){
            count_data = count_data + 1;
        });
        if(count_data > 0)
        {
            var quiz_form = $(this).serialize();     
            //alert(quiz_form);  
            $.ajax({
                url: "../teacher/CreateQuiz.php",
                method: "POST",
                data: quiz_form,
                success:function(data)
                {
                    //data = data.split("New record created successfully. Last inserted ID is: ").pop();
                    location.replace("../teacher/home.php");
                }
            })
        }
        else {
            window.alert("Please insert atleast one question!");
        }
    });

    $('.repeater').repeater({
        // (Optional)
        // start with an empty list of repeaters. Set your first (and only)
        // "data-repeater-item" with style="display:none;" and pass the
        // following configuration flag
        initEmpty: true,
        // (Optional)
        // "defaultValues" sets the values of added items.  The keys of
        // defaultValues refer to the value of the input's name attribute.
        // If a default value is not specified for an input, then it will
        // have its value cleared.
        // defaultValues: {
        //     'text-input': 'foo'
        // },
        // (Optional)
        // "show" is called just after an item is added.  The item is hidden
        // at this point.  If a show callback is not given the item will
        // have $(this).show() called on it.
        show: function () {
            $(this).slideDown();
        },
        // (Optional)
        // "hide" is called when a user clicks on a data-repeater-delete
        // element.  The item is still visible.  "hide" is passed a function
        // as its first argument which will properly remove the item.
        // "hide" allows for a confirmation step, to send a delete request
        // to the server, etc.  If a hide callback is not given the item
        // will be deleted.
        hide: function (deleteElement) {
            if (confirm('Are you sure you want to delete this element?')) {
                $(this).slideUp(deleteElement);
            }
        },
        // (Optional)
        // You can use this if you need to manually re-index the list
        // for example if you are using a drag and drop library to reorder
        // list items.
        ready: function (setIndexes) {
        },
        // (Optional)
        // Removes the delete button from the first list item,
        // defaults to false.
        isFirstItemUndeletable: true
    });
});
