// !!! attention: the script are include in the footer.php page !!!
// For the add, there is no modal script are no data are called from the database. Data are just going to be sent.

// <!-- Begin Edit popupfile -->

$(document).ready(function () {
  $(".editbtn").on("click", function () {
    $("#editmodal").modal("show");

    $span = $(this).closest("span");

    var data = $span
      .children("span")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(data);

    $("#id_ressource").val(data[0]);
    $("#ressource_name").val(data[1]);
    $("#ressource_type").val(data[2]);
    $("#ressource_status").text(data[3]);
  });
});

// <!-- End Edit popupfile -->

// <!-- Begin Delete popupfile appel ligne 96-->

$(document).ready(function () {
  $(".deletebtn").on("click", function () {
    $("#deletemodal").modal("show");

    $span = $(this).closest("span");

    var data = $span
      .children("span")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(data);
    $("#id_delete").val(data[0]);
  });
});

// <!-- End Delete popupfile -->
// <!-- Validateur add a ressource -->

$(document).ready(function () {
  //Contact Form validation on click event
  $("#contact-form").on("submit", function () {
    var valid = true;

    var ressourceName = $("#ressource-name").val();
    var type = $("#ressource-type").val();

    if (ressourceName == "") {
      $("#ressource-name-info").html("This is a required field");
      valid = false;
    }

    if (type == "") {
      $("#ressource-type-info").html("This is a required field");
      valid = false;
    }

    return valid;
  });
});
// </script>
// <!-- end of validator add a ressource -->

// <!-- Validateur edit a ressource -->
// <script>
$(document).ready(function () {
  //Contact Form validation on click event
  $("#edit-form").on("submit", function () {
    var valid = true;
    var ressource_name = $("#ressource_name").val();
    var ressource_type = $("#ressource_type").val();

    if (ressource_name == "") {
      $("#ressource_name-info").html("This is a required field");
      valid = false;
    }

    if (ressource_type == "") {
      $("#ressource_type-info").html("This is a required field");
      valid = false;
    }

    return valid;
  });
});
// </script>
// <!-- end of validator edit a ressource -->
