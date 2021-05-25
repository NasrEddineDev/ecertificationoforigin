$(function () {

  $("#date").datepicker({
    dateFormat: "MM - DD - yy",
    showOn: "both",
    buttonText: '<i class="zmdi zmdi-chevron-down"></i>',
  });

  var inputs = document.querySelectorAll('.inputfile');
  Array.prototype.forEach.call(inputs, function (input) {
    var label = input.nextElementSibling,
      labelVal = label.innerHTML;

    input.addEventListener('change', function (e) {
      var fileName = '';
      if (this.files && this.files.length > 1)
        fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
      else
        fileName = e.target.value.split('\\').pop();

      if (fileName)
        label.querySelector('span').innerHTML = fileName;
      else
        label.innerHTML = labelVal;
    });
  });

  // input.addEventListener('focus', function () { input.classList.add('has-focus'); });
  // input.addEventListener('blur', function () { input.classList.remove('has-focus'); });

});

// function readURL(input) {
//   if (input.files && input.files[0]) {

//     var reader = new FileReader();

//     reader.onload = function (e) {
//       $('.image-upload-wrap').hide();

//       $('.file-upload-image').attr('src', e.target.result);
//       $('.file-upload-content').show();

//       $('.image-title').html(input.files[0].name);
//     };

//     reader.readAsDataURL(input.files[0]);

//   } else {
//     removeUpload();
//   }
// }

// function removeUpload() {
//   $('.file-upload-input').replaceWith($('.file-upload-input').clone());
//   $('.file-upload-content').hide();
//   $('.image-upload-wrap').show();
// }
// $('.image-upload-wrap').bind('dragover', function () {
//   $('.image-upload-wrap').addClass('image-dropping');
// });
// $('.image-upload-wrap').bind('dragleave', function () {
//   $('.image-upload-wrap').removeClass('image-dropping');
// });


// function readURL1(input) {
//   if (input.files && input.files[0]) {

//     var reader1 = new FileReader();

//     reader1.onload = function (e) {
//       $('.image-upload-wrap1').hide();

//       $('.file-upload-image1').attr('src', e.target.result);
//       $('.file-upload-content1').show();

//       $('.image-title1').html(input.files[0].name);
//     };

//     reader1.readAsDataURL(input.files[0]);

//   } else {
//     removeUpload1();
//   }
// }

// function removeUpload1() {
//   $('.file-upload-input1').replaceWith($('.file-upload-input1').clone());
//   $('.file-upload-content1').hide();
//   $('.image-upload-wrap1').show();
// }
// $('.image-upload-wrap1').bind('dragover', function () {
//   $('.image-upload-wrap1').addClass('image-dropping');
// });
// $('.image-upload-wrap1').bind('dragleave', function () {
//   $('.image-upload-wrap1').removeClass('image-dropping');
// });




function readURLRoundStamp(input) {
  if (input.files && input.files[0]) {

    var readerRoundStamp = new FileReader();

    readerRoundStamp.onload = function (e) {
      $('.image-upload-wrap-round-stamp').hide();

      $('.file-upload-image-round-stamp').attr('src', e.target.result);
      $('.file-upload-content-round-stamp').show();

      $('.image-title-round-stamp').html(input.files[0].name);
    };

    readerRoundStamp.readAsDataURL(input.files[0]);

  } else {
    removeUploadRoundStamp();
  }
}

function removeUploadRoundStamp() {
  $('.file-upload-input-round-stamp').replaceWith($('.file-upload-input-round-stamp').clone());
  $('.file-upload-content-round-stamp').hide();
  $('.image-upload-wrap-round-stamp').show();
}
$('.image-upload-wrap-round-stamp').bind('dragover', function () {
  $('.image-upload-wrap-round-stamp').addClass('image-dropping');
});
$('.image-upload-wrap-round-stamp').bind('dragleave', function () {
  $('.image-upload-wrap-round-stamp').removeClass('image-dropping');
});



function readURLSquareStamp(input) {
  if (input.files && input.files[0]) {

    var readerSquareStamp = new FileReader();

    readerSquareStamp.onload = function (e) {
      $('.image-upload-wrap-square-stamp').hide();

      $('.file-upload-image-square-stamp').attr('src', e.target.result);
      $('.file-upload-content-square-stamp').show();

      $('.image-title-square-stamp').html(input.files[0].name);
    };

    readerSquareStamp.readAsDataURL(input.files[0]);

  } else {
    removeUploadSquareStamp();
  }
}

function removeUploadSquareStamp() {
  $('.file-upload-input-square-stamp').replaceWith($('.file-upload-input-square-stamp').clone());
  $('.file-upload-content-square-stamp').hide();
  $('.image-upload-wrap-square-stamp').show();
}
$('.image-upload-wrap-square-stamp').bind('dragover', function () {
  $('.image-upload-wrap-square-stamp').addClass('image-dropping');
});
$('.image-upload-wrap-square-stamp').bind('dragleave', function () {
  $('.image-upload-wrap-square-stamp').removeClass('image-dropping');
});


function readURLSignature(input) {
  if (input.files && input.files[0]) {

    var readerSignature = new FileReader();

    readerSignature.onload = function (e) {
      $('.image-upload-wrap-signature').hide();

      $('.file-upload-image-signature').attr('src', e.target.result);
      $('.file-upload-content-signature').show();

      $('.image-title-signature').html(input.files[0].name);
    };

    readerSignature.readAsDataURL(input.files[0]);

  } else {
    removeUploadSignature();
  }
}

function removeUploadSignature() {
  $('.file-upload-input-signature').replaceWith($('.file-upload-input-signature').clone());
  $('.file-upload-content-signature').hide();
  $('.image-upload-wrap-signature').show();
}
$('.image-upload-wrap-signature').bind('dragover', function () {
  $('.image-upload-wrap-signature').addClass('image-dropping');
});
$('.image-upload-wrap-signature').bind('dragleave', function () {
  $('.image-upload-wrap-signature').removeClass('image-dropping');
});