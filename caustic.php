<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>First Aid Training</title>
    <link rel="stylesheet" href="css/cpr.css" />
    <link href="style/style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="header">
    </div>
    <div id="loader">
      <img src="images/animation.svg" alt="loader" />
    </div>
    <div class="container caustic_page fade-in">
      <a href="Accidents.php"
        ><i class="fa fa-arrow-left"></i>Accidents and Emergencies</a
      >
        <div class="main">
            <div class="definition">
                <h2 class="def-heading">Caustic Soda Ingestion:</h2>
      
                <p class="def">Caustic ingestion occurs when someone accidentally or deliberately ingests a caustic or corrosive substance.</p>
            </div>
      
            <div class="definition">
                <h2 class="def-heading">Signs and symptoms</h2>

                <p class="instruction">Initial symptoms of caustic soda ingestion include drooling and dysphagia. In severe cases, pain, vomiting, and sometimes bleeding develop immediately in the mouth, throat, chest, or abdomen. Airway burns may cause coughing, tachypnea, or stridor.</p>
                <p>Later symptms of Caustic soda ingestions include stenosis, It occurs after more severe muscocal injury commonly.</p>
              
              
            </div>
          
            <div class="definition">
              <h2 class="def-heading">Treatments</h2>
              <p class="def">In patients with caustic ingestion, airway monitoring and control is the first priority. When airway compromise is present, a definitive airway must be established. In patients with a stable airway and no clinical or radiological sign of perforation, medical therapy should be initiated.

                Arrangements should be made for urgent esophagogastroduodenoscopy (EGD) to grade the degree of injury and establish long-term prognosis, In asymptomatic patients, however, EGD may be withheld in favor of observation. Pediatric patients who remain asymptomatic for several hours (2 - 4 hours) after an exploratory ingestion and who are tolerating a normal diet may be discharged with appropriate follow-up and return precautions
               </p>

               <p class="def">Take them to the health centre immediately or <a href="tel:+19145956140">call emergency at +19145956140</a></p>

              </div>
          </div>
        </div>
    </div>
  </body>
  <script>
    const loaded=document.getElementById('loader')
    const electric_contents=document.querySelector('.caustic_page')
    setTimeout(() => {
        loaded.style.display='none';
    }, 3000);
</script>
</html>
