$(document).ready(function(){
    $('#add_blog').click(function(e){
        debugger;
        e.preventDefault();
        $('.error').remove();
        var blog_name = $('#blog_name').val();
        var cat_name = $('.cat_name').is(':checked');
        var token = $('input[name="_token"]').val();
        var error = 0; 
        var arr = $('.cat_name:checked').map(function() {return this.value;}).get().join(',');
        if(blog_name=='')
        {
            $('#blog_name').after('<span class="error"style="color:red;">please enter blog name</span><br>');
            error = 1;
        }
        if(cat_name==false)
        {
            $('.add_blog').before('<span class="error" style="color:red;">please enter category</span><br>');
            error = 1;
        }
        if (error == 1)
        {
            e.preventDefault();
        }
        else
        {
            $.ajax({
            url:"ins_blog",
            type: 'post',
            dataType: 'json',
            data: {'blog_name': blog_name, 'cat_name': arr,'_token': token},
            success:function(res) {
                window.location='dashboard';
            }
        });
        }

    })
})
$(function() {
debugger;
    var start = moment().subtract(7, 'days');
    var end = moment();

    function cb(start, end) {debugger;
    	$('#add_start_date').val(start.format('MMMM D, YYYY'));
            $('#add_end_date').val(end.format('MMMM D, YYYY'));
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        maxDate: new Date(),
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },

    }, cb);

    cb(start, end);
    
    $('.date_change').on('apply.daterangepicker', function (ev, picker) {
    	debugger;

    	FilterDate();
    });
});
function FilterDate()
{
	var start = $('#add_start_date').val();
	var end = $('#add_end_date').val();	
	debugger;
	$.ajax({
            url:"FilterDate",
            type: 'GET',
            dataType: 'json',
            data: {from: start, to: end},
            success:function(res) {
                $('.paginate_data').html(res.html);
            }
        });
}
