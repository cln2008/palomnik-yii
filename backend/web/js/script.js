$(document).ready(function() {

    $('.actPage').click(function(){


        var pageId    = $(this).attr('page_id');
        var setActive = 0;

        if( $(this).prop("checked") ){
          setActive = 1;
        }

        // alert('ACT PAGE CLICK: ' + pageId + ', SET ACTIVE: [' + setActive + ']');

        /*
        $.ajax({
            type: "POST",
            url:  "/modals.php",
            data: {actionId:'setGalleryActive', galleryId:id, setActive:setActive},
            success: function(msg){ }
        });
        */




        $.post('test',
               { is_active : setActive, pageId : pageId},
               function(){
                 var color = "navy";
                 if(setActive == 0 )
                     color = "gray";
                 // alert('OK: ' + pageId);
                 $('#pageRow' + pageId).css('color', color);
               }
        );

/*
        // tripDescr:tripDescr,
        $.post('/modals.php', { actionId : 'setIndexText',
            pageText : pageText,
            pageId   : pageId
        }, function()
        {
            location.href='/trips';
        });
*/

    });


});

