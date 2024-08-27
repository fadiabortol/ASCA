"use strict";

jQuery(document).ready(function ($) {
  function loadProducts(categoryId, button) {
    var nonce = ajax_object.nonce;
    $.ajax({
      url: ajax_object.ajax_url,
      type: 'POST',
      data: {
        action: 'load_products_by_category',
        category_id: categoryId,
        nonce: nonce
      },
      success: function success(response) {
        $('#product-container').html(response); // Remove active class from all buttons

        $('.category-button').removeClass('active'); // Add active class to the clicked button

        if (button) {
          button.addClass('active');
        }
      },
      error: function error() {
        $('#product-container').html('An error occurred.');
      }
    });
  } // Load products for the first category on page load


  var defaultCategoryId = $('#default-category-button').data('category-id');

  if (defaultCategoryId) {
    loadProducts(defaultCategoryId, $('#default-category-button'));
  } // Handle button clicks


  $('.category-button').on('click', function (e) {
    e.preventDefault();
    var categoryId = $(this).data('category-id');
    loadProducts(categoryId, $(this));
  });
});