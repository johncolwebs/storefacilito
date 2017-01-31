
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
require('bootstrap-material-design');
require('./bootstrap-editable.min');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

// Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//     el: '#app'
// });

/*
* x-editable for inline actions in form
* of orders list
*/
// Globals x-editable
$.fn.editable.defaults.mode = 'inline'; // modal | inline
$.fn.editable.defaults.ajaxOptions = {type: 'PUT'};

$(document).ready(function () {
  // x-editable
  $(".set-guide-number").editable();
  $(".select-status").editable({
    source: [
      {value: 'creado', text:'Creado'},
      {value: 'enviado', text:'Enviado'},
      {value: 'recibido', text:'Recibido'}
    ]
  });

  /*
  * Product Edit & Create Show preview image
  */
  oFReader = new FileReader(), rFilter = /^(?:image\/jpeg|image\/jpeg|image\/jpeg|image\/png|image\/gif)$/i;
  oFReader.onload = function (oFREvent) {
    document.getElementById("previewCover").src = oFREvent.target.result;
  };
  function loadImageFile() {
    if (document.getElementById("cover").files.length === 0) { return; }
    var oFile = document.getElementById("cover").files[0];
    if (!rFilter.test(oFile.type)) { alert("Elige por favor una imágen válida!"); return; }
    oFReader.readAsDataURL(oFile);
  }
  $('#cover').change(function () {
    loadImageFile(this);
  });

  /*
  * Add To Cart OnClick btn
  */
  $(".add-to-cart").on("submit", function (e) {
    e.preventDefault();

    var $form = $(this);
    var $button = $form.find("[type='submit']");

    $.ajax({
      url: $form.attr('action'),
      method: $form.attr('method'),
      data: $form.serialize(),
      dataType: 'JSON',
      beforeSend: function () {
        $button.val('Cargando...').addClass('disabled');
      },
      success: function (data) {
        $button.val('Agregado').removeClass('disabled btn-info').addClass('btn-success');
        $('.products_count').html(data.products_count).removeClass('label-info').addClass('label-warning');

        setTimeout(function () {
          restartButtonCart($button);
        },2000);
      },
      error: function (error) {
        $button.val('Error').removeClass('disabled btn-info').addClass('btn-danger');

        setTimeout(function () {
          restartButtonCart($button);
        },3000);
      }
    });
    return false;
  });
  function restartButtonCart ($button) {
    $button.val('Agregar al carrito').removeClass('disabled btn-success btn-danger').addClass('btn-info');
    $('.products_count').removeClass('label-warning').addClass('label-info');
  }


});