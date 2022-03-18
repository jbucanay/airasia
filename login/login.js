$(function(){
    $('#form').submit(function()
{
  if ($('#password').val() == '' ||
      $('#username').val() == '')
  {
    // alert('Please enter both names')
    $('#label_un, .col-sm-2, .col-form-label').css('color','red')
    return false
  }
})
});