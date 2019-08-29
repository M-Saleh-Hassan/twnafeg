$(document).ready(function() {
    validate();
    $('input').on('keyup', validate);
  });
  $( "#form" ).submit(function() {

    localStorage.setItem('test', 5);

  });



  console.log($(".date"));


// check the package used and difine no of childs
  $(document).on('change', 'select', function() {
    var value = $( this ).val();

    console.log(value);

    if ( value == "a114J00000066SfQAI") {
      $(".one-child").removeClass("d-none");

      console.log(value)
    }
    else if (value == "a114J00000066SgQAI") {
      $(".d-none").removeClass("d-none")
      console.log(value)
    }
    else if (value == "") {
      $(".one-child").addClass("d-none")
      $(".two-child").addClass("d-none")

      console.log(value)
    }
    console.log($(".date"));
});
$( ".date" ).datepicker({
  dateFormat: "dd/mm/yy"
});
