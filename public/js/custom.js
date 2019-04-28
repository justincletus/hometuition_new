$(document).ready(function() {
$('#contactform').DataTable();

$('#filedetailsdb').DataTable();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#searchschool').on('submit', function(e){
  $.ajaxSetup({
          header:$('meta[name="_token"]').attr('content')
      })
      e.preventDefault(e);

      var name = $('#search').val();
      $("#search").empty();
      $.post('/schools/schoolname/'+name, function(response){
        if(response.success){
          var name = response.schoolname;
          //$.each(response.schoolname)
          var name1 = response.schoolname[0]['id'];
          var name2 = response.schoolname[0]['name'];
          //$.each(response.schoolname ,)

          console.log(response);

          $('#searchresult').append('<h2> '+name2 +' Details..</h2>');

            }
      else {
            console.log('no record found!');
            $("#searchresult").append('<h2>No ' +name +' Found!. Please try again</h2>');
            $("#search").empty();
          }

      }, 'json');

      //alert(name);

});



$('#sta_id').change(function(){
var sta_id = $(this).val();

// alert(sta_id);
$.post('/university/getcity/'+$(this).val(), function(response){
  if (response.success) {
    //console.log(response);
    if(response){
      //alert(res);
      // $('#city1').empty();
      // var city = $('#sta_id').empty();
      $('#city1').append('<option>Select</option>');
      $.each(response.cities, function(i, citi){
        $('#city1').append('<option value="' +i+  '">' +citi+'</option>');
      });
    }
    else {
      $('#city1').empty();
    }
  }

}, 'json');

});

$('#city1').on('change', function(){
var cityID = $(this).val();
//alert(cityID);

$.post('/university/getuniversity/'+$(this).val(), function(response){
  if (response.success) {
    //console.log(response);
    if(response){
      //alert(res);
      // $('#city1').empty();
      // var city = $('#sta_id').empty();
      $('#university1').append('<option>Select</option>');
      $.each(response.universities, function(i, university){
        $('#university1').append('<option value="' +i+  '">' +university+'</option>');
      });
    }
    else {
      $('#university1').empty();
    }
  }

}, 'json');
});

$('#university1').on('change', function(){
var uniID = $(this).val();
//alert(cityID);

$.post('/university/getcolleges/'+$(this).val(), function(response){
  if (response.success) {
    var title = response.title;
    console.log('response');
    if (response) {
        $('#collegelist').append('<h2>Collge list will comming soon..</h2>'+title);

          }
    else {
          $("#collegelist").append('<h2>No Collge list </h2>');
        }

      }
      else {
        console.log('no record');
      }

    });

});


//syllabus details starts here
$('#examboardsabcd').on('change', function(e) {
  var ex = $(this).val();
  $.post('/schools/getstandard/'+ex, function(response) {
    if (response.success) {
      if (response) {

        $('#schoolstds').empty();
        // var city = $('#sta_id').empty();
        $('#schoolstds').append('<option>Select</option>');
        $.each(response.stds, function(i, std){
          $('#schoolstds').append('<option value="' +i+  '">' +std+'</option>');
        });
      }
      console.log(response);

    }
    else {
      var title = 'no record found';
      console.log(title);
      $('#schoolstds').empty();
      $('#subjectname').empty();
    }


  }, 'json');
  // alert(ex);


});

$('#schoolstds').on('change', function(e) {
  var sc = $(this).val();
  var exam = $('#examboardsabcd').val();

  //alert(sc);

  $.post('/schools/getsubject/'+sc +'/'+exam , function(response) {
    if (response.success) {
      if (response) {
        console.log(response.subs);
        var name = [],id = [];
        var data = response.subs;
        $('#subjectname').empty();
        $('#subjectname').append('<option>Select</option>');

        data.forEach(function(v) {
          $('#subjectname').append('<option value="' +v['id']+  '">' +v['name']+'</option>');
          var a = v['name'];
          console.log(a);
          //range.push(v.range);
        });

      }


    }
    else {
      console.log('no data found');
      $('#subjectname').empty();
    }

  }, 'json');
  //alert(sc +' ' +exam);

});

$('#subjectname').on('change', function(e){

  var subid = $(this).val();
  var exam = $('#examboardsabcd').val();
  var std = $('#schoolstds').val();

  //alert(subid +' '+exam +' '+ std);

  var checkval = true;
  $.post('/schools/getsyllabus/'+exam +'/' +std +'/' +subid , function(response){
    if(response.success){

      //console.log(response.id);
      // var ids = response.id;
      // console.log(ids);
      console.log(response.syll);

      if(response.syll != ''){

        // console.log('checking output');
        var details = response.syll[0]['filename'];

        $('#syllabusdetails').empty();
        $('#syllabusdetails').append('<h4>Result ' +details +'</h4>');

        console.log(details);

      }
      else {
        $('#syllabusdetails').empty();
        $('#syllabusdetails').append('<h4> No Record Found.. Please try any other option.. </h4>');
        console.log('failed');
      }

    }
    else {

      console.log('no record found');
      $('#syllabusdetails').empty();
    }

  },'json');


});





});
