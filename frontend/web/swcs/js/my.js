$(document).ready(function() {
reqIndex = 5;
     
            $('#w0')
                .on('click', '.addButton', function() { 
               {

                var incIndex = parseInt($(this).closest('table').attr('data-value'));
                incIndex++;
                
                var $temp = $(this).closest('tr');
                    $clonedele = $temp.clone();
                    $c    = $clonedele.insertAfter($temp);
                    
                            $clonedele.find('select, input').each(function()
                            {
 
                                var $name = $(this).attr('name');

                                var $rep_name = $name.replace('['+(parseInt(incIndex)-1)+']', '['+parseInt(incIndex)+']');
                                $(this).removeAttr('name').attr('name', $rep_name);
                                $(this).val('');

                                
                                $(".fa-times").on("click",function(){
                                    if($(this).closest('tbody').find("tr").length  > 1){ 

                                        if($(this).closest("td").find('.addButton').length > 0 ){
                                            $(this).closest('tr').prev('tr').find(".fa-times").before($(this).closest("td").find('.addButton'));
                                        }
                                     
                                        $(this).closest('tr').remove();    
                                    }

                                    
                                });  
 
                                 $(this).removeAttr('name');
                            });
                    ; 
                $('.dform').attr('data-value', incIndex)
                    }
                
                $(this).hide(); 
                });
                $('#applicationdocument-0-name').attr("required", "true");
                $('#applicationdocument-0-document').attr("required", "true");
                
        });

 
