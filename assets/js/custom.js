
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
// start page shop
var brandwomen = $("#show_women").data('women');
var brandmen = $("#show_men").data('men');
var brandkid = $("#show_kid").data('kid');
var brandcos = $("#show_cos").data('cos');
var brandacc = $("#show_acc").data('acc');
$.ajax({
  url:"ajax_action.php",
  method:"POST", 
  
  data: { pageshop: "",women_show_all: brandwomen },
      
  success: function(data) {
    // console.log(data);
    $('#pagination_data').html(data);
    $('.image-popup').magnificPopup({
      type: 'image'
  });
      
  }
 });
// show women

$("#show_women").on("click", function () {
  // var brand = $("#show_women").data('women');
   
  
  
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { women_show_all: brandwomen },
    success: function (data) {
      // console.log(data);
      $('#pagination_data').html(data);

      $('.image-popup').magnificPopup({
        type: 'image'
    });
    }

  });


});

$(document).on('click', '.pagination_link13', function(){  
  var page = $(this).attr("id");
  
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { pagewomen: page, brand13: brandwomen },
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
  // var category = $("#show_men").data('men');
  
  
  
  
  
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { men_show_all: brandmen },
    success: function (data) {
      $('#pagination_data').html(data);

      $('.image-popup').magnificPopup({
        type: 'image'
    });
    }

  });


});

$(document).on('click', '.pagination_link14', function(){  
  var page = $(this).attr("id");
  
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { pagemen: page,brand14: brandmen },
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
  // var category = $("#show_kid").data('kid');
     
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { kid_show_all: brandkid },
    success: function (data) {
      $('#pagination_data').html(data);

      $('.image-popup').magnificPopup({
        type: 'image'
    });
    }

  });


});

$(document).on('click', '.pagination_link15', function(){  
  var page = $(this).attr("id");
  
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { pagekid: page,brand15: brandkid },
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
  // var category = $("#show_acc").data('acc');
     
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { acc_show_all: brandacc },
    success: function (data) {
      $('#pagination_data').html(data);

      $('.image-popup').magnificPopup({
        type: 'image'
    });
    }

  });


});

$(document).on('click', '.pagination_link17', function(){  
  // var page = $(this).attr("id");
  
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { pageacc: page, brand17: brandacc },
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
  // var category = $("#show_cos").data('cos');
     
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { kid_show_all: brandcos },
    success: function (data) {
      $('#pagination_data').html(data);

      $('.image-popup').magnificPopup({
        type: 'image'
    });
    }

  });


});

$(document).on('click', '.pagination_link16', function(){  
  var page = $(this).attr("id");
  
  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: { pagecos: page, brand16: brandcos },
    success: function (data) {
      $('#pagination_data').html(data);

      $('.image-popup').magnificPopup({
        type: 'image'
    });
    }

  });
  
   
});

////search




$('#search-input').keypress(function(event){
  var keycode = (event.keyCode ? event.keyCode : event.which);
  if(keycode == '13'){
    var searchstring  = $(this).val();

     window.location = 'shop.php' ;
    // console.log(searchstring);

    $.ajax({
      url: "ajax_action.php",
      method: "POST",
      data: { search: searchstring },
      // async: false,
            
      success: function (data) {
        $('#pagination_data').html(data);
        alert(data);
  
        $('.image-popup').magnificPopup({
          type: 'image'
      });
      }
  
    });
    
  }
});

/**
 * filter women
 */

$(document).on('click', '#filter_btn', function(){  
 var minAmount =  $('#minamount').val();
 var maxAmount = $('#maxamount').val();
 var minAmount = minAmount.substring(1);
 var maxAmount = maxAmount.substring(1);
 var brand = $("#brandId").data('brand');
 

 $.ajax({
  url: "ajax_action.php",
  method: "POST",
  data: { minAmount: minAmount,maxAmount:maxAmount, brand:brand },
  success: function (data) {
    
    $('#pagination_data').html(data);    
    $('.image-popup').magnificPopup({
      type: 'image'
  });
  }

});


   
});

$(document).on('click', '.pagination_link_filter', function(){  
  
  var page = $(this).attr("id");
  var brand = $("#brandId").data('brand');
  var minAmount =  $('#minamount').val();
 var maxAmount = $('#maxamount').val();
 var minAmount = minAmount.substring(1);
 var maxAmount = maxAmount.substring(1);
 

  $.ajax({
    url: "ajax_action.php",
    method: "POST",
    data: {minAmount: minAmount,maxAmount:maxAmount, brand:brand, page:page },
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

// ajax save email for news letters
$(document).on('click', '#saveNewletter', function(e){
  e.preventDefault()  
  const email = $('#email').val();
 
  if(  !validateEmail(email)) 
  { 
    $('#result_email').html('Email không hợp lệ');
  }
  else
  {
    $.ajax({
      url: "ajax_newsletter.php",
      method: "POST",
      data: {email: email},
      success: function (data) {
        console.log(data);
        $('#result_email').html(data);  
      
      }
    
    });
    
  }

  
  
 
 


  
   
});

function validateEmail($email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test( $email );
}
