window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'Stunting.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();

        })

       document.getElementById("download2")
        .addEventListener("click", () => {
            const invoice2 = this.document.getElementById("invoice2");
            console.log(invoice2);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'Infant_and_Young_Child_feeding.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice2).set(opt).save();
        })  

         document.getElementById("download3")
        .addEventListener("click", () => {
            const invoice3 = this.document.getElementById("invoice3");
            console.log(invoice3);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'micronutrient_defeciencies.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice3).set(opt).save();
        }) 
        
        
        document.getElementById("download4")
        .addEventListener("click", () => {
            const invoice4 = this.document.getElementById("invoice4");
            console.log(invoice4);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'School_Feeding.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice4).set(opt).save();
        }) 

        
        document.getElementById("download5")
        .addEventListener("click", () => {
            const invoice5 = this.document.getElementById("invoice5");
            console.log(invoice5);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'Overweight_&_Obesity.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice5).set(opt).save();
        }) 

        
        document.getElementById("download6")
        .addEventListener("click", () => {
            const invoice6 = this.document.getElementById("invoice6");
            console.log(invoice6);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'Cash_Based_Transfers.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoic6).set(opt).save();
        }) 
}

