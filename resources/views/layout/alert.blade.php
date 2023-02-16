<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js"></script>
<script>
    $(document).ready(function(){       
        Swal.fire({        
           type: '{{session()->get('status')}}',
           title: '{{session()->get('message')}}',
           showConfirmButton: false,
           timer: 3000
        })
    });  
</script>
