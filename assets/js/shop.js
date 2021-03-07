$(document).ready(function() {
    // OPTION WOOCOMMERCE PRODUCT

    // Récapitulatif des options choisies

    // var nbItemSelected = 0;

    // // Affiche "Aucune option sélectionnée" dans le récapitulatif
    // function displayRecap() {
    //     if (nbItemSelected > 0) {
    //         removeItemSelected("noOption");
    //     } else if (nbItemSelected == 0) {
    //         displayItemSelected("noOption");
    //     }
    // }

    // // Affiche dans le récap l'item sélectionné
    // function displayItemSelected(option) {
    //     var itemOption = document.createElement("a");
    //     if (option == "noOption") {
    //         itemOption.innerHTML = "Aucune option sélectionnée";
    //     } else {
    //         itemOption.innerHTML = option;
    //     }
    //     itemOption.className = "btn btn-primary " + option;
    //     $("#recap_option_product div").append(itemOption);
    // }

    // // Supprime l'item du récap s'il est décoché
    // function removeItemSelected(option) {
    //     $("." + option).remove();
    // }


    // Affichage des options en cliquant sur la div scrolldown
    // var displayOption = false;
    // $("#scrolldown_option_product a").on("click", () => {
    //     if (displayOption == false) {
    //         $("#option_box_product").css("display", "block");
    //         displayOption = true;
    //     } else {
    //         $("#option_box_product").css("display", "none");
    //         displayOption = false;
    //     }
    // });

    // // Sélection des options dans la liste
    // var booleanOption1 = false;
    // var booleanOption2 = false;
    // var booleanOption5 = false;

    // // Sélectionner l'option et appel la fonction displayRecap
    // function optionSelected(idOption, idSelectOption, valOption, nameOption) {
    //     $("#" + idOption).css("border", "solid 2px blue");
    //     $("#" + idSelectOption).val(valOption).trigger("change");
    //     booleanOption1 = true;
    //     nbItemSelected++;
    //     displayRecap();
    //     displayItemSelected(nameOption);
    // }

    // // Déselectionne l'option et appel la fonction removeItemSelected
    // function optionUnselected(idOption, idSelectOption, valOption, nameOption) {
    //     $("#" + idOption).css("border", "solid 1px grey");
    //     $("#" + idSelectOption).val(valOption).trigger("change");
    //     booleanOption1 = false;
    //     nbItemSelected--;
    //     displayRecap();
    //     removeItemSelected(nameOption)
    // }

    // $("#optionProduct1").on("click", () => {
    //     if (booleanOption1 == false) {
    //         optionSelected("optionProduct1", "pa_batterie", "long-range", "batterie");
    //     } else {
    //         optionUnselected("optionProduct1", "pa_batterie", "batterie-origine", "batterie");
    //     }
    // });

    // $("#optionProduct2").on("click", () => {
    //     if (booleanOption2 == false) {
    //         $("#optionProduct2").css("border", "solid 2px blue");
    //         $("#pa_moteur").val("power-5kw").trigger("change");
    //         booleanOption2 = true;
    //     } else {
    //         $("#optionProduct2").css("border", "solid 1px ");
    //         $("#pa_moteur").val("moteur-origine").trigger("change");
    //         booleanOption2 = false;
    //     }
    // });

    // $("#optionProduct5").on("click", () => {
    //     if (booleanOption5 == false) {
    //         $("#optionProduct5").css("border", "solid 2px blue");
    //         $("#pa_accelerateur").val("accelerateur-poignee").trigger("change");
    //         booleanOption5 = true;
    //     } else {
    //         $("#optionProduct5").css("border", "solid 1px ");
    //         $("#pa_accelerateur").val("accelerateur-origine").trigger("change");
    //         booleanOption5 = false;
    //     }
    // });
});