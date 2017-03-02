<?php
    

    SESSION_START();
    if($_SESSION['slogin'] && $_SESSION['smatricula']){
        $logado = $_SESSION['slogin'];
    }else{
        unset($_SESSION['slogin']);
        unset($_SESSION['smatricula']);
        SESSION_DESTROY();
        header('Location: index.html');
    }

    include_once 'common/header.php';
    include_once 'common/nav.php';
?>
<div id="oi" class="container-fluid col-md-10 mt-3">
    <div class="row">
                    <div class="col-md-10 col-sd-6">
    
                        <br>
                        
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>
                                    
                                </th>
                                <th colspan=2>1° Bimestre</th>
                                <th colspan=2>2° Bimestre</th>
                                <th colspan=2>3° Bimestre</th>
                                <th colspan=2>4° Bimestre</th>
                            </tr>
                            <tr>
                                <th>Disciplinas</th>
                                <th>Nota</th>
                                <th>Faltas</th>
                                <th>Nota</th>
                                <th>Faltas</th>
                                <th>Nota</th>
                                <th>Faltas</th>
                                <th>Nota</th>
                                <th>Faltas</th>
                            </tr>
                           
                                <tr>
                                    <th>
                                   
                                    </th>
                                    <td>
                                       
                                    </td>
                                    
                                    <td>
                                      
                                    </td>
                                    <td>
                                      
                                    </td>
                                    <td>
                                      
                                    </td>
                                    <td>
                                     
                                    </td>
                                    <td>
                                       
                                    </td>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        
                     
            
                                    </td>
                                </tr>
                                 <tr class="collapse">
                                    <td colspan="12">
                                       
                                </tbody>
                            </table>
                            
                                    </td>
                                </tr>
                                
                        </table>
                       
                    </div>
    



<?php
    include_once 'common/footer.php';
?>
