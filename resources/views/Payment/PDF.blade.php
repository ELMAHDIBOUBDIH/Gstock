<div style="float: right;"> 
<h4 style="color: black;font-weight: 700; ">date facturation le : {{$Invoice->date}}</h4>
  Fournisseur n° :{{$provider->name}}<br>
  raison Social :{{$provider->name_society}}<br>
  nom :{{$provider->name}}<br>
  
  tel :{{$provider->tel}}<br>
  fax :{{$provider->fax}}<br>
  email :{{$provider->mail}}<br>
  adresse :<textarea rows="4" cols="50" style="width: 100%;">{{substr($provider->adresse,1,30)}}<br></textarea>
 
</div>
 <div style="float: left;" >
       
              <img src="https://www.mrkzgulf.com/do.php?img=510112" height="100" width="160"><br>
              <h4 style="color: black;font-weight: 700;"> <br>DrStock<br>
              hay afrag rue 30<br>
              Tiznit<br>
              0661554997</h4>
              
</div>

<br><br>

<div style="margin-top:25%;">
              <br>  <font size="3" style="color: #331204;font-size: 26px;background-color: rgb(191, 187, 49);" >date de commande : {{$Invoice->date}}<br>Reçu Facture {{$Invoice->invoice_type}} N°: A-
            {{$Invoice->reference_cmd}}/{{$date->year}}</font>
   
</div>
            
         
      


            
            
        
     

      <br><br>
      <table border="1px" style="width: 100%;background-color:rgba(31, 29, 29, 0.28);color: black;font-size: 173%;margin-top: 4%;">
        
        <tbody>
          <tr>
            <td>{{ trans('text.date')}}</td>
            <td>{{$payment->date}}</td>
          </tr>
          <tr>
            <td>{{ trans('text.montant')}}</td>
            <td>{{$payment->montant}}   {{trans('text.DH')}}</td>
          </tr>
          <tr>
            <td>{{ trans('text.rest_a_paye')}}</td>
            <td>{{$payment->rest_pay}}   {{trans('text.DH')}}</td>
          </tr>
          <tr>
            <td>{{ trans('text.mode_payement')}}</td>
            <td>{{$payment->type}}</td>
          </tr>
          <tr>
            <td>{{ trans('text.paye')}}</td>
            <td>{{$payment->payer}}   {{trans('text.DH')}}</td>
          </tr>
          <tr>
            <td>{{trans('text.description')}}</td>
            <td>
            <textarea rows="4" cols="50" style="width: 100%;">{{$payment->description}}</textarea></td>
          </tr>
          
        </tbody>
      </table>
    </table>
    <table>
      
    </table>
  </div>
</div>