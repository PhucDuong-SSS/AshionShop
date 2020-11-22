
$(document).ready(function () {

 
  
    $.ajax({
    url:"ajax_action.php",
    method:"POST", 
    data: { index: "" },
        
    success: function(data) {
     
      $('#load_data').html(data);
      $('.image-popup').magnificPopup({
        type: 'image'
    });
        
    }
   });

  
  


  $("#all").on("click", function () {
    var category = $("#all").data('all');
    
    $.ajax({
      url: "ajax_action.php",
      method: "POST",
      data: { all: category },
      success: function (data) {

        $('#load_data').html(data);
        $('.image-popup').magnificPopup({
          type: 'image'
      });
        
        
      }

    });
  
  
  
  
  });
  //
  $("#women").on("click", function () {
    var category = $("#women").data('women');
    
    
    $.ajax({
      url: "ajax_action.php",
      method: "POST",
      data: { women: category },
      success: function (data) {
        $('#load_data').html(data);
        $('.image-popup').magnificPopup({
          type: 'image'
      });
        
      }

    });
  
  
  
  });
//
$("#men").on("click", function () {
  var category = $("#men").data('men');
  
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { men: category },
    success: function (data) {
      $('#load_data').html(data);
      $('.image-popup').magnificPopup({
        type: 'image'
    });

    }

  });



});
//
$("#kid").on("click", function () {
  var category = $("#kid").data('kid');
  
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { kid: category },
    success: function (data) {
      $('#load_data').html(data);
      $('.image-popup').magnificPopup({
        type: 'image'
    });


    }

  });



});
//
$("#acc").on("click", function () {
  var category = $("#acc").data('acc');
  
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { acc: category },
    success: function (data) {
      $('#load_data').html(data);
      $('.image-popup').magnificPopup({
        type: 'image'
    });
    }

  });



});
//
$("#cos").on("click", function () {
  var category = $("#cos").data('cos');
  
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { cos: category },
    success: function (data) {
      $('#load_data').html(data);
      $('.image-popup').magnificPopup({
        type: 'image'
    });
    }

  });

});

/**
 * ajax for show page
 */
// show wowmnent 



$("#show_women").on("click", function () {
  var category = $("#show_women").data('women');
  
  
  
  
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { women_show_all: category },
    success: function (data) {
      $('#pagination_data').html(data);

      $('.image-popup').magnificPopup({
        type: 'image'
    });
    }

  });


});

$(document).on('click', '.pagination_link', function(){  
  var page = $(this).attr("id");
  
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { page: page },
    success: function (data) {
      $('#pagination_data').html(data);

      $('.image-popup').magnificPopup({
        type: 'image'
    });
    }

  });
  
   
});
// show men
$("#show_men").on("click", function () {
  var category = $("#show_men").data('men');
  
  
  
  
  
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { men_show_all: category },
    success: function (data) {
      $('#pagination_data').html(data);

      $('.image-popup').magnificPopup({
        type: 'image'
    });
    }

  });


});

$(document).on('click', '.pagination_link', function(){  
  var page = $(this).attr("id");
  
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { page: page },
    success: function (data) {
      $('#pagination_data').html(data);

      $('.image-popup').magnificPopup({
        type: 'image'
    });
    }

  });
  
   
});
// show kid
$("#show_kid").on("click", function () {
  var category = $("#show_kid").data('kid');
     
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { kid_show_all: category },
    success: function (data) {
      $('#pagination_data').html(data);

      $('.image-popup').magnificPopup({
        type: 'image'
    });
    }

  });


});

$(document).on('click', '.pagination_link', function(){  
  var page = $(this).attr("id");
  
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { page: page },
    success: function (data) {
      $('#pagination_data').html(data);

      $('.image-popup').magnificPopup({
        type: 'image'
    });
    }

  });
  
   
});
// show accessories
$("#show_acc").on("click", function () {
  var category = $("#show_acc").data('acc');
     
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { acc_show_all: category },
    success: function (data) {
      $('#pagination_data').html(data);

      $('.image-popup').magnificPopup({
        type: 'image'
    });
    }

  });


});

$(document).on('click', '.pagination_link', function(){  
  var page = $(this).attr("id");
  
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { page: page },
    success: function (data) {
      $('#pagination_data').html(data);

      $('.image-popup').magnificPopup({
        type: 'image'
    });
    }

  });
  
   
});
// show cosmetic
$("#show_cos").on("click", function () {
  var category = $("#show_cos").data('cos');
     
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { kid_show_all: category },
    success: function (data) {
      $('#pagination_data').html(data);

      $('.image-popup').magnificPopup({
        type: 'image'
    });
    }

  });


});

$(document).on('click', '.pagination_link', function(){  
  var page = $(this).attr("id");
  
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { page: page },
    success: function (data) {
      $('#pagination_data').html(data);

      $('.image-popup').magnificPopup({
        type: 'image'
    });
    }

  });
  
   
});

////search




// $('#search-input').keypress(function(event){
//   var keycode = (event.keyCode ? event.keyCode : event.which);
//   if(keycode == '13'){
//     var searchstring  = $(this).val();

//     //  window.location = 'shop.php' ;
//     // console.log(searchstring);

//     $.ajax({
//       url: "ajax_action.php",
//       method: "POST",
//       data: { search: searchstring },
//       // async: false,
            
//       success: function (data) {
//         $('#pagination_data').html(data);
//         alert(data);
  
//         $('.image-popup').magnificPopup({
//           type: 'image'
//       });
//       }
  
//     });
    
//   }
// });

/**
 * filter
 */
$(document).on('click', '#filter_btn', function(){  
 var minAmount =  $('#minamount').val();
 var maxAmount = $('#maxamount').val();
 var minAmount = minAmount.substring(1);
 var maxAmount = maxAmount.substring(1);

 $.ajax({
  url: "ajax_action.php",
  method: "POST",
  data: { minAmount: minAmount,maxAmount:maxAmount },
  success: function (data) {
    $('#pagination_data').html(data);

    $('.image-popup').magnificPopup({
      type: 'image'
  });
  }

});

  
  
 
  
   
});

///////////////////////
$('.image-popup').magnificPopup({
  type: 'image'
});




});
