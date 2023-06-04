<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<?php if(isset($datatable)): ?>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script>
    // let table = new DataTable('.myDataTable');
    var table = $('.myDataTable').DataTable( {
        responsive: true
    } );

    var table = $('.myBookingTable').DataTable( {
        responsive: true,
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "info": false,
        "ordering": false
    } );
</script>
<?php endif; ?>
<?php if(isset($createBooking)): ?>
<script>
    $(function(){
        var currentDate = new Date();
        var dateString = currentDate.toISOString().split('T')[0];
        document.getElementById("checkindate").setAttribute('min', dateString);
        document.getElementById("checkoutdate").setAttribute('min', dateString);
        
    })

    function validateCheckInDate(){
        var checkInDate = document.getElementById("checkindate").value;
        
        var date = new Date(checkInDate);
        date.setDate(date.getDate() + 1);

        document.getElementById("checkoutdate").removeAttribute('disabled');
        document.getElementById("checkoutdate").setAttribute('min', date.toISOString().split('T')[0]);
        
    }

    function validateCheckOutDate()
    {
        document.getElementById("checkindate").setAttribute('readonly', true);
        document.getElementById("checkoutdate").setAttribute('readonly', true);
        document.getElementById("quantity").removeAttribute('disabled');
    }
 
    function handleTotalPrice() {
        var checkin = new Date(document.getElementById("checkindate").value);
        var checkout = new Date(document.getElementById("checkoutdate").value);

        if (checkin <= checkout) {
            var timeDiff = Math.abs(checkout.getTime() - checkin.getTime());
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
        } 
        
        var price = '<?= $package['price'] ?>';
        var quantity = document.getElementById("quantity").value;
        var totalHarga = (price * quantity) * diffDays

        var totalHarga = document.getElementById("totalprice").value = totalHarga;
    }
</script>
<?php endif; ?>