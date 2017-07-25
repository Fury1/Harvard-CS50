<!-- Start Calculators -->
<div class="row">
<div class="col-md-4">   
<table class="table-bordered">
    <thead>
        <caption>Rear Gear Ratio Correction</caption>      
    </thead>  
        <tbody>
            <form id="gearratio" method="POST" action="gearratio.php">
            <tr>
                <td><b>OEM Tire Size</b></td>
                <td>                
                    <select class="form-control" name="oetire">
                        <option value="">Please Choose</option>
                        <option value = "25">25 inches</option>
                        <option value = "26">26 inches</option>
                        <option value = "27">27 inches</option>
                        <option value = "28">28 inches</option>                       
                        <option value = "29">29 inches</option>
                        <option value = "30">30 inches</option>
                        <option value = "31">31 inches</option>
                        <option value = "32">32 inches</option>
                        <option value = "33">33 inches</option>                       
                        <option value = "34">34 inches</option>
                        <option value = "35">35 inches</option>
                        <option value = "36">36 inches</option>
                        <option value = "37">37 inches</option>                        
                        <option value = "38">38 inches</option>
                        <option value = "39">39 inches</option>
                        <option value = "40">40 inches</option>
                        <option value = "41">41 inches</option>                        
                        <option value = "42">42 inches</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b>NEW Tire Size</b></td>
                <td>
                    <select class="form-control" name="ntire">
                        <option value="">Please Choose</option>
                        <option value = "25">25 inches</option>
                        <option value = "26">26 inches</option>
                        <option value = "27">27 inches</option>
                        <option value = "28">28 inches</option>                       
                        <option value = "29">29 inches</option>
                        <option value = "30">30 inches</option>
                        <option value = "31">31 inches</option>
                        <option value = "32">32 inches</option>
                        <option value = "33">33 inches</option>                       
                        <option value = "34">34 inches</option>
                        <option value = "35">35 inches</option>
                        <option value = "36">36 inches</option>
                        <option value = "37">37 inches</option>                        
                        <option value = "38">38 inches</option>
                        <option value = "39">39 inches</option>
                        <option value = "40">40 inches</option>
                        <option value = "41">41 inches</option>                        
                        <option value = "42">42 inches</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b>OEM Gear Ratio</b></td>
                <td>
                    <select class="form-control" name="gr">
                        <option value="">Please Choose</option>
                        <option value = "2.73">2.73</option>
                        <option value = "3.08">3.08</option>
                        <option value = "3.31">3.31</option>
                        <option value = "3.42">3.42</option>                       
                        <option value = "3.55">3.55</option>
                        <option value = "3.73">3.73</option>
                        <option value = "3.90">3.90</option>
                        <option value = "4.11">4.11</option>
                        <option value = "4.30">4.30</option>                       
                        <option value = "4.56">4.56</option>
                        <option value = "4.88">4.88</option>
                        <option value = "5.13">5.13</option>
                        <option value = "5.38">5.38</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" class="btn btn-info" value="Submit"></td>
                <td><div id="result-gear">Your New Ratio...</div></td>
            </tr>            
        </form>
    </tbody>    
</table>
</div>

<div class="col-md-4">   
<table class="table-bordered">
    <thead>       
        <caption>MPH Programing Correction</caption>         
    </thead>    
    <tbody>
        <form id="mphcorrect" method="POST" action="mphcorrect.php">
            <tr>
                <td><b>OEM Tire Size</b></td>
                <td>
                    <select class="form-control" name="oetire">
                        <option value="">Please Choose</option>
                        <option value = "25">25 inches</option>
                        <option value = "26">26 inches</option>
                        <option value = "27">27 inches</option>
                        <option value = "28">28 inches</option>                       
                        <option value = "29">29 inches</option>
                        <option value = "30">30 inches</option>
                        <option value = "31">31 inches</option>
                        <option value = "32">32 inches</option>
                        <option value = "33">33 inches</option>                       
                        <option value = "34">34 inches</option>
                        <option value = "35">35 inches</option>
                        <option value = "36">36 inches</option>
                        <option value = "37">37 inches</option>                        
                        <option value = "38">38 inches</option>
                        <option value = "39">39 inches</option>
                        <option value = "40">40 inches</option>
                        <option value = "41">41 inches</option>                        
                        <option value = "42">42 inches</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b>NEW Tire Size</b></td>
                <td>
                    <select class="form-control" name="ntire">
                        <option value="">Please Choose</option>
                        <option value = "25">25 inches</option>
                        <option value = "26">26 inches</option>
                        <option value = "27">27 inches</option>
                        <option value = "28">28 inches</option>                       
                        <option value = "29">29 inches</option>
                        <option value = "30">30 inches</option>
                        <option value = "31">31 inches</option>
                        <option value = "32">32 inches</option>
                        <option value = "33">33 inches</option>                       
                        <option value = "34">34 inches</option>
                        <option value = "35">35 inches</option>
                        <option value = "36">36 inches</option>
                        <option value = "37">37 inches</option>                        
                        <option value = "38">38 inches</option>
                        <option value = "39">39 inches</option>
                        <option value = "40">40 inches</option>
                        <option value = "41">41 inches</option>                        
                        <option value = "42">42 inches</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b>Vehicle Speed</b></td>
                <td>
                    <select class="form-control" name="mph">
                        <option value="">Please Choose</option>
                        <option value = "1">1 mph</option>
                        <option value = "10">10 mph</option>
                        <option value = "20">20 mph</option>
                        <option value = "30">30 mph</option>
                        <option value = "40">40 mph</option>                       
                        <option value = "50">50 mph</option>
                        <option value = "60">60 mph</option>
                        <option value = "70">70 mph</option>
                        <option value = "80">80 mph</option>
                        <option value = "90">90 mph</option>                       
                        <option value = "100">100 mph</option>
                        <option value = "110">110 mph</option>
                        <option value = "120">120 mph</option>
                        <option value = "130">130 mph</option>                        
                        <option value = "140">140 mph</option>
                        <option value = "150">150 mph</option>
                        <option value = "160">160 mph</option>
                        <option value = "170">170 mph</option>                        
                        <option value = "180">180 mph</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" class="btn btn-info" value="Submit"></td>
                <td><div id="result-mph">Your Actual Speed...</div></td>
            </tr>
        </form>
    </tbody>    
</table>
</div>

<div class="col-md-4">   
<table class="table-bordered">
    <thead>
        <caption>Engine RPM At Speed</caption>          
    </thead>     
    <tbody>
        <form id="rpm" method="POST" action="rpm.php">
            <tr>
                <td><b>Gear Ratio</b></td>
                <td>
                    <select class="form-control" name="gr">
                        <option value="">Please Choose</option>
                        <option value = "2.73">2.73</option>
                        <option value = "3.08">3.08</option>
                        <option value = "3.31">3.31</option>
                        <option value = "3.42">3.42</option>                       
                        <option value = "3.55">3.55</option>
                        <option value = "3.73">3.73</option>
                        <option value = "3.90">3.90</option>
                        <option value = "4.11">4.11</option>
                        <option value = "4.30">4.30</option>                       
                        <option value = "4.56">4.56</option>
                        <option value = "4.88">4.88</option>
                        <option value = "5.13">5.13</option>
                        <option value = "5.38">5.38</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b>Tire Size</b></td>
                <td>
                    <select class="form-control" name="tire">
                        <option value="">Please Choose</option>
                        <option value = "25">25 inches</option>
                        <option value = "26">26 inches</option>
                        <option value = "27">27 inches</option>
                        <option value = "28">28 inches</option>                       
                        <option value = "29">29 inches</option>
                        <option value = "30">30 inches</option>
                        <option value = "31">31 inches</option>
                        <option value = "32">32 inches</option>
                        <option value = "33">33 inches</option>                       
                        <option value = "34">34 inches</option>
                        <option value = "35">35 inches</option>
                        <option value = "36">36 inches</option>
                        <option value = "37">37 inches</option>                        
                        <option value = "38">38 inches</option>
                        <option value = "39">39 inches</option>
                        <option value = "40">40 inches</option>
                        <option value = "41">41 inches</option>                        
                        <option value = "42">42 inches</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b>Vehicle Speed</b></td>
                <td>
                    <select class="form-control" name="vs">
                        <option value="">Please Choose</option>
                        <option value = "10">10 mph</option>
                        <option value = "20">20 mph</option>
                        <option value = "30">30 mph</option>
                        <option value = "40">40 mph</option>                       
                        <option value = "50">50 mph</option>
                        <option value = "60">60 mph</option>
                        <option value = "70">70 mph</option>
                        <option value = "80">80 mph</option>
                        <option value = "90">90 mph</option>                       
                        <option value = "100">100 mph</option>
                        <option value = "110">110 mph</option>
                        <option value = "120">120 mph</option>
                        <option value = "130">130 mph</option>                        
                        <option value = "140">140 mph</option>
                        <option value = "150">150 mph</option>
                        <option value = "160">160 mph</option>
                        <option value = "170">170 mph</option>                        
                        <option value = "180">180 mph</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" class="btn btn-info" value="Submit"></td>
                <td><div id="result-rpm">Your Engine RPM...</div></td>
            </tr>
         </form>
    </tbody>
</table>
</div>
</div>
