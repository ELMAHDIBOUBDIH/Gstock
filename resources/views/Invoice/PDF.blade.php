<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" href="">
  <style type="text/css" media="screen">
.table1{margin-top: 6%;width:100%;}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
body {
    font-family: "Verdana", Times, serif;
}
  </style>
  <body>
 
   <div style="float: left;">
     <img src="https://www.mrkzgulf.com/do.php?img=510112" height="100" width="160"><br>
        <h4 style="color: black;font-weight: 700;background-color: #fff9b5;"> <br>DrStock<br>
        hay afrag rue 30<br>
        Tiznit<br>
        0661554997</h4>
   </div>     
     
<div style="float: right;">
 <h4 style="background-color: rgb(70, 255, 127);">date facturation le : {{$Invoice->date}}</h4> 
       
      
        <b>  <h4 style="color:black;6f;font-weight: 700; ">
        Fournisseur n° :{{$provider->id}}<br>
        raison Social :{{$provider->name_society}}<br>
        nom :{{$provider->name}}<br>
        tel :{{$provider->tel}}<br>
        fax :{{$provider->fax}}<br>
        email :{{$provider->email}}<br>
         adresse :{{$provider->adresse}}<br></h4>
        </b>
     
</div> <br>
<div style="margin-top: 22%;background-color: #b8a2fb;border-width:5px;border-bottom-style:outset;"><center> <font size="3" ><p>date de commande : {{$Invoice->date}}<br>Facture {{$Invoice->invoice_type}} N°: A-
        {{$Invoice->reference_cmd}}/{{$date->year}}</p>   </font>
        </center>
</div>
    
<br><br>
 <table class="table" style="margin-top:8%;" id="t01">
                    <thead>
                        <tr style="background-color: #c2d6d6;color:black;">
                            <th>{{ trans('text.N°produit')}}</th>
                            <th>{{ trans('text.disignation')}}</th>
                            <th>{{ trans('text.marque')}}</th>
                            <th>{{ trans('text.categorie')}}</th>
                            
                            <th>{{ trans('text.prix_A')}}</th>
                            <th>{{ trans('text.qnt_cmd')}}</th>
                            <th >{{ trans('text.TVA')}}</th>
                            <th ">{{ trans('text.T_TH')}}</th>
                            <th ">{{ trans('text.T_TTC')}}</th>
                        </tr>
                    </thead>
                    <tbody>
          @foreach($commande_achat->achat_lignes as $Ligneachat)
              <tr>
                  <td> {{$Ligneachat->article->id}}</td>
                  <td>{{$Ligneachat->article->name}}</td>
                  <td>{{$Ligneachat->article->Brand}}</td>
                  <td>{{$Ligneachat->article->category->name}}</td>
                  <td>{{$Ligneachat->article->prix_achat}}</td>
                            
                  <td>{{substr($Ligneachat->qnt_cmd ,0,6)}}</td>
                  <td>{{$Ligneachat->TVA }} %</td>
                  <td>{{$Ligneachat->T_HT}}</td>
                  <td>{{$Ligneachat->T_TTC}}</td>

                            <!--  button -->
                            
              </tr>
                        @endforeach
                       
                    </tbody>
                </table>
<!--table-->

<?php $ToTAL_ht=0; ?>
 @foreach($commande_achat->achat_lignes as $Ligneachat)
  <input type="hidden" value="{{$ToTAL_ht=$ToTAL_ht+($Ligneachat->T_HT) }}">  

      @endforeach
<br>
  <table class="table" style="width: 54%;     margin-top: 5%;">
    <thead>
      <tr style="background-color: rgba(232, 162, 162, 0.62);" >
        <th>TOTAL  HT</th>
        <th>TOTAL TVA</th>
        <th style="background-color: #ff9900;">TOTAL TTC</th>
      </tr>
    </thead>
    <tbody>
      
      <tr style="background-color: rgba(216, 255, 0, 0.55);
}
">
    
     
      <td><font color="red"><b>{{$ToTAL_ht}} DH</b></font></td>
      <td><font color="red"><b>{{($commande_achat->total)-($ToTAL_ht)}} DH</b></font></td>
       <td><font color="red"><b>{{$commande_achat->total}} DH</b></font></td> 
      </tr>
      
    </tbody>
  </table>  
</body>
</html>