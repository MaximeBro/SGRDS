<div>
    <h1 style="text-align:center;">Saisie d'un rattrapage</h1>
    
    <div class="row">
        <div class="input-field col s4">
            <input type="text" class="datepicker">
            <label>Date du DS</label>
        </div>
        <div class="input-field col s4">
            <select>
                <option value="" disabled selected>Type du DS</option>
                <option value="1">Papier</option>
                <option value="2">Machine</option>
            </select>
            <label>Type DS</label>
        </div>
        <div class="input-field col s4">
            <input id="number" type="number" class="validate" min="1" max="4">
            <label for="number">Durée (h)</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s4">
            <select multiple>
                <option value="" disabled selected>Valider les étudiants</option>
                <option value="1">Axel Brazeau</option>
                <option value="2">Maxime Brochard</option>
                <option value="3">Enzo Ferrand</option>
                <option value="4">Adrien Decharrois</option>
            </select>
            <label>Liste des absents</label>
        </div>
        <div class="input-field col s4">
            <select>
                <option value="" disabled selected>Choisir le semestre</option>
                <option value="1">S1</option>
                <option value="2">S2</option>
                <option value="3">S3</option>
                <option value="4">S4</option>
                <option value="5">S5</option>
                <option value="6">S6</option>
            </select>
            <label>Semestre</label>
        </div>
        <div class="input-field col s4">
            <select>
                <option value="" disabled selected>Choisir la ressource</option>
                <option value="1">Maths</option>
                <option value="2">Français</option>
                <option value="3">SVT</option>
                <option value="4">Chimie</option>
                <option value="5">Physique</option>
                <option value="6">Brazo</option>
            </select>
            <label for="number">Ressource</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s4">
            <select>
                <option value="" disabled selected>Professeur concerné</option>
                <option value="1">Mr Legrix</option>
                <option value="2">Mme Boukachour</option>
                <option value="3">Mr Le Pivert</option>
                <option value="4">Mr Alabboud</option>
            </select>
            <label>Professeur concerné</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <label>
                <input id="indeterminate-checkbox" type="checkbox" />
                <span>Envoi d'un mail au professeur concerné avec la liste des étudiants absents (automatique)</span>
            </label>
        </div>
    </div>

    <div clas="row" style="display:flex; justify-content:center; align-items:center;">
        <div class="input-field col s4">
            <a class="waves-effect waves-light btn">Confirmer</a>
        </div>  
    </div>

</div>