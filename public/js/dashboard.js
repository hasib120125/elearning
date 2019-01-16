function submitForm(form){
    var formURL = $(form).attr('action');
    var formData = new FormData(form);
    console.log(formData);
    $.post({
      url: formURL,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data, textStatus, jqXHR) {
        $('#modal-form, #modal-form-normal').modal('hide');
        $("#data-table").DataTable().draw(false);
        $("#success-msg").html(data.success);
        $("#success-msg").show();
        setTimeout(function(){
          $("#success-msg").hide();
        }, 5000)
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        if (jqXHR.status === 422) {
          $('.help-block').html('');
          $('.has-error').removeClass('has-error');
          errors = jqXHR.responseJSON;
          $.each(errors.errors, function (key, value) {
            var group = $("[name=" + key + "]").closest('.form-group');
            if(!group.length){
              group = $("[name='" + key + "[]']").closest('.form-group');
            }
            $(group).addClass("has-error")
            $(group).find('.help-block').html(value[0]);
          });
        } else if(jqXHR.status === 403) {
          var element = document.getElementById('error-msg');
          $("#modal-form").modal('hide');
          element.innerHTML = "You don't have permission to do this";
          element.style.display = "block";
        } else {
          console.log(jqXHR.responseText)
        }
      }
    })
}
function validateAndSubmitForm(form){
  var data = new FormData($(form)[0]);
  data.delete('files[]');
  data.delete('file');
  data.append('validate', true);
  $.post({
    url : $(form).attr('action'),
    data: data,
    processData: false,  // Important!
    contentType: false,
    cache: false,
    success: function(){
      $(".has-error").removeClass('has-error');
      $(".help-block").html('');
      submitForm(form);
    },
    error: function(jqXHR){
      if (jqXHR.status === 422) {
        $('.help-block').html('');
        $('.has-error').removeClass('has-error');
        errors = jqXHR.responseJSON;
        $.each(errors.errors, function (key, value) {
          var group = $("[name=" + key + "]").closest('.form-group');
          if(!group.length){
            group = $("[name='" + key + "[]']").closest('.form-group');
          }
          $(group).addClass("has-error")
          $(group).find('.help-block').html(value[0]);
        });
      } else if(jqXHR.status === 403) {
        var element = document.getElementById('error-msg');
        $("#modal-form").modal('hide');
        element.innerHTML = "You don't have permission to do this";
        element.style.display = "block";
      } else {
        //console.log(jqXHR.responseText)
      }
    }
  });
}

function submitBulkQuestionForm(form){
    var formURL = $(form).attr('action');
    var formData = new FormData(form);
    $.post({
      url: formURL,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data, textStatus, jqXHR) {
        $('#modal-form, #modal-form-normal').modal('hide');
        $("#data-table").DataTable().draw(false);
        $("#success-msg").html(data.success);
        $("#success-msg").show();
        setTimeout(function(){
          $("#success-msg").hide();
        }, 5000)
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        if (jqXHR.status === 422) {
          $('.help-block').html('');
          $('.has-error').removeClass('has-error');
          $('.errors-list').html('');
          $('.error-box').hide();
          errors = jqXHR.responseJSON;
          $.each(errors.errors, function (key, value) {
            var group = $("[name=" + key + "]").closest('.form-group');
            if(!group.length){
              group = $("[name='" + key + "[]']").closest('.form-group');
            }
            $(group).addClass("has-error")
            $(group).find('.help-block').html(value[0]);

            $('.errors-list').append('<li>' + value + "</li>");
          });

          $('.error-box').show();
        } else if(jqXHR.status === 403) {
          var element = document.getElementById('error-msg');
          $("#modal-form").modal('hide');
          element.innerHTML = "You don't have permission to do this";
          element.style.display = "block";
        } else {
          console.log(jqXHR.responseText)
        }
      }
    })
}
$(document).ready(function(){
  /** add active class and stay opened when selected */
  var url = window.location;

  var items = $('.sidebar-menu >li a').filter(function() {
    return url == this.href
  })
  $(items).parent().addClass('active');
  // for treeview
  items = $('ul.treeview-menu a').filter(function() {
    return url == this.href
  })
  if(!items.length){
    items = $('ul.treeview-menu a').filter(function() {
      return url.toString().indexOf(this.href) !== -1;
    })
  }
  $(items).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

  $("#data-table").on('click', '.delete-button', function (e) {
    e.preventDefault();
    $.get($(this).attr('href'))
    .done(function (data) {
      $("#modal-form .modal-content").html(data);
      $("#modal-form").modal('show');
    });
  })

  $('#data-table').on('click', '.activate-button', function (e) {
    e.preventDefault();
    var table = $("#data-table").DataTable();
    var row = $(this).closest('tr');
    var user = table.row(row).data();
    var isActive = true;
    if (user.is_active == 1) {
      isActive = false;
    }
    $.ajax({
      url: $(this).attr('href'),
      method: 'PATCH',
      data: {
        _token: $("meta[name=csrf-token]").attr('content'),
        id: user.id,
        is_active: isActive
      }
    })
    .done(function (data) {
      table.draw(false);
    })
  })

  $(".select2").select2({
    widht: "100%",
    placeholder: "Please Select"
  })
  $('.datetimepicker,.datepicker').attr('autocomplete', 'off');
  $('.datetimepicker').datetimepicker({
    format: "yyyy-mm-dd hh:ii:00",
    showMeridian: true,
    autoclose: true,
    minuteStep: 59,
  })
  $('.datepicker').datetimepicker({
    format: "yyyy-mm-dd",
    showMeridian: true,
    autoclose: true,
    minView: 2,
  })
  $(".file-upload-single").fileinput({
    'showUpload':false,
    'showPreview':false,
    'showRemove': false
  })
  $(document).on('click', '.in-modal', function(e)
  {
    e.preventDefault();
    $.get($(this).attr('href'))
    .done(function(data)
    {
      $("#modal-form .modal-content").html(data);
      $("#modal-form").modal('show');
    });
  })
  $('#modal-form, #modal-form-normal').on('shown.bs.modal', function() {
    $('.datetimepicker').datetimepicker({
      format: "yyyy-mm-dd hh:ii:00",
      showMeridian: true,
      autoclose: true,
      minuteStep: 59,
    })
    $('.datepicker').datetimepicker({
      format: "yyyy-mm-dd",
      showMeridian: true,
      autoclose: true,
      minView: 2,
    })
    $(".select2").select2({
      widht: "100%",
      placeholder: "Please Select"
    })

    $('.file-remove-button').click(function(e){
      e.preventDefault();
      $(this).siblings('.file-id').val(0);
      $(this).siblings('.file-revert-button').show();
      $(this).siblings('.file-name').css('text-decoration', 'line-through');
      $(this).hide();
    })

    $('.file-revert-button').click(function(e){
      e.preventDefault();
      $(this).siblings('.file-id').val(1);
      $(this).siblings('.file-remove-button').show();
      $(this).siblings('.file-name').css('text-decoration', 'none');
      $(this).hide();
    })

  });

  $(document).on('change', ".file-multiple", function(){
    var fileName = $(this).val().replace(/.*(\/|\\)/, '');
    fileNameWOExt = fileName.substr(0, fileName.lastIndexOf('.'));
    if($(this).is(".file:last")){
      var input = $('<input class="file" name="files[]" type="file">');
      var newInput = $(this).closest('.file-input').after(input);
      $('.file').last().fileinput({
        'showUpload':false,
        'showPreview':false
      });
    }
  })
  $(document).on('click', ".fileinput-remove", function(){
    if($(this).closest('.file-input').not(':first')){
      $(this).closest('.file-input').prev('label').remove();
      $(this).closest('.file-input').remove();
    }else{
      var html = '<span class="file-caption-icon"></span>';
      html+= '<input class="file-caption-name" onkeydown="return false;" onpaste="return false;" placeholder="Select file...">'
      $(this).closest('.file-input').prev('label').remove();
      $(this).closest('.file-input').find('.file-caption').html(html);
    }
  })
})
