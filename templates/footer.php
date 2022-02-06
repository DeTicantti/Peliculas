<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script>
const head = document.querySelector('.lisInv');
    head.classList.add('current');
    console.log(head);</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

     <!-- datatables-->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    
    <!-- datatables extension SELECT -->
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    
    <!-- extension BOTONES -->
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>

    <script>
     $(document).ready(function(){
         $("#example").dataTable({
             // 1 - inicializacion
              select:true,  
              
              //2 - tipo de selección 
              /*select:{
                  style:'sinlge' //single o multi
              }*/
                
               // 3 - fila o celda 
              /*select:{            
                items:'cell' //cell o row      
              }*/

            //4 - uso del checkbox
            /* columnDefs: [ {
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            } ],
            select: {
                style:    'os',
                selector: 'td:first-child'
            },  */
            
            //5 - cambio de idioma     
            // language: {
            //     select: {
            //         rows: {
            //             _: "Ud. seleccionó %d registros", //msj cuando todavia no seleccionó nada
            //             0: "Haga clic en una fila para seleccionarla.", //aviso
            //             1: "Solo 1 fila seleccionada" //aviso
            //         }
            //     }
            // }


            // 6 - uso de botones
            /*dom: 'Bfrtip',
                buttons: [
                    'selected',
                    'selectedSingle',
                    'selectAll',
                    'selectNone',
                    'selectRows',
                    'selectColumns',
                    'selectCells'
                ],*/

         });
     })
    </script>
  </body>
</html>

