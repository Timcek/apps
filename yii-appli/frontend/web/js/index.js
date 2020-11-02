$(document).on('change', '.company',function() {
    var sd=$( ".company option:selected" ).text();

    switch (sd) {
        case "Audi":
            $("#cars-model").replaceWith('<select id="cars-model" class="form-control" name="Cars[model]" style="border:0; border-bottom:1px solid black; border-radius:0;" aria-required="true" aria-invalid="false"><option value="50">50</option><option value="60">60</option><option value="80">80</option><option value="90">90</option><option value="100">100</option><option value="200">200</option><option value="A1">A1</option><option value="A2">A2</option><option value="A3">A3</option><option value="A4">A4</option><option value="A4 Allroad">A4 Allroad</option><option value="A5">A5</option><option value="A6">A6</option><option value="A6 Allroad">A6 Allroad</option><option value="A7">A7</option><option value="A8">A8</option><option value="Coupe">Coupe</option><option value="Cabriolet">Cabriolet</option><option value="E-Tron">E-Tron</option><option value="Q1">Q1</option><option value="Q2">Q2</option><option value="Q3">Q3</option><option value="Q5">Q5</option><option value="Q7">Q7</option><option value="Q8">Q8</option><option value="R8">R8</option><option value="RS2">RS2</option><option value="RS3">RS3</option><option value="RS4">RS4</option><option value="RS5">RS5</option><option value="RS6">RS6</option><option value="RS7">RS7</option><option value="RS Q3">RS Q3</option><option value="RS Q5">RS Q5</option><option value="RS Q8">RS Q8</option><option value="S1">S1</option><option value="S2">S2</option><option value="S3">S3</option><option value="S4">S4</option><option value="S5">S5</option><option value="S6">S6</option><option value="S7">S7</option><option value="S8">S8</option><option value="SQ2">SQ2</option><option value="SQ5">SQ5</option><option value="SQ7">SQ7</option><option value="SQ8">SQ8</option><option value="TT">TT</option><option value="V8">V8</option>></select>');
          break;
        case "BMW":
            $("#cars-model").replaceWith('<select id="cars-model" class="form-control" name="Cars[model]" style="border:0; border-bottom:1px solid black; border-radius:0;" aria-required="true" aria-invalid="false"><option value="1802" >1802</option><option value="2002" >2002</option><option value="i3" >i3</option><option value="i8" >i8</option><option value="iX3" >iX3</option><option value="M1" >M1</option><option value="M2" >M2</option><option value="M3" >M3</option><option value="M4" >M4</option><option value="M5" >M5</option><option value="M6" >M6</option><option value="M8" >M8</option><option value="serija 1:" >Serija 1</option><option value="serija 2:" >Serija 2</option><option value="serija 3:" >Serija 3</option><option value="serija 4:" >Serija 4</option><option value="serija 5:" >Serija 5</option><option value="serija 6:" >Serija 6</option><option value="serija 7:" >Serija 7</option><option value="serija 8:" >Serija 8</option><option value="serija X1:" >Serija X1</option><option value="serija X2:" >Serija X2</option><option value="serija X3:" >Serija X3</option><option value="serija X4:" >Serija X4</option><option value="serija X5:" >Serija X5</option><option value="serija X6:" >Serija X6</option><option value="serija X7:" >Serija X7</option><option value="Z1" >Z1</option><option value="Z3" >Z3</option><option value="Z4" >Z4</option><option value="Z8" >Z8</option>></select>');
          break;
        case "Mercedes-benz":
            $("#cars-model").replaceWith('<select id="cars-model" class="form-control" name="Cars[model]" style="border:0; border-bottom:1px solid black; border-radius:0;" aria-required="true" aria-invalid="false"><option value="190" >190</option><option value="W123" >W123</option><option value="AMG GT" >AMG GT</option><option value="A-Razred" >A-Razred</option><option value="B-Razred" >B-Razred</option><option value="C-Razred" >C-Razred</option><option value="Citan" >Citan</option><option value="CL-Razred" >CL-Razred</option><option value="CLA-Razred" >CLA-Razred</option><option value="CLC-Razred" >CLC-Razred</option><option value="CLK-Razred" >CLK-Razred</option><option value="CLS-Razred" >CLS-Razred</option><option value="E-Razred" >E-Razred</option><option value="EQC" >EQC</option><option value="G-Razred" >G-Razred</option><option value="GL-Razred" >GL-Razred</option><option value="GLA-Razred" >GLA-Razred</option><option value="GLB-Razred" >GLB-Razred</option><option value="GLC-Razred" >GLC-Razred</option><option value="GLC coupe" >GLC coupe</option><option value="GLE-Razred" >GLE-Razred</option><option value="GLE coupe" >GLE coupe</option><option value="GLK-Razred" >GLK-Razred</option><option value="GLS-Razred" >GLS-Razred</option><option value="ML-Razred" >ML-Razred</option><option value="R-Razred" >R-Razred</option><option value="S-Razred" >S-Razred</option><option value="SL-Razred" >SL-Razred</option><option value="SLC-Razred" >SLC-Razred</option><option value="SLS-Razred" >SLS-Razred</option><option value="SLK-Razred" >SLK-Razred</option><option value="SLR-Razred" >SLR-Razred</option><option value="V-Razred" >V-Razred</option><option value="X-Razred" >X-Razred</option><option value="Vaneo" >Vaneo</option><option value="Viano" >Viano</option><option value="Vito" >Vito</option></select>');
          break;
    }
});

