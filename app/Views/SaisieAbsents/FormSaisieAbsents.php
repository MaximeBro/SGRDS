<h1 style="text-align:center;">Saisie des absents</h1>

<div class="wrapper" style="padding-top: 32px;padding-left: 64px;padding-right: 64px;">
    <div class="row">
        <div class="input-field col s4">
            <input type="text" class="datepicker">
            <label>Date</label>
        </div>

        <div class="full-width" style="padding-left:32px;padding-right:32px">
            <div class="input-field col s4">
                <select>
                    <option value="" disabled selected>Ressource</option>
                    <option value="1">R2.01 Dev</option>
                    <option value="2">R2.02 PPP</option>
                    <option value="3">R2.03 Comm</option>
                </select>
                <label>Ressource</label>
            </div>
        </div>

        <div class="full-width">
            <div class="input-field col s4" style="padding-right:0px;">
                <select>
                    <option value="" disabled selected>Semestre</option>
                    <option value="1">Semestre 1</option>
                    <option value="2">Semestre 2</option>
                    <option value="3">Semestre 3</option>
                </select>
                <label>Semestre</label>
            </div>
        </div>
    </div>
    <?php if(!empty($etudiants)): ?>
    <div class="row" style="padding-top : 32px;">
        <div class="input-field col s12">
            <select>
                <option value="" disabled selected>Elève absent</option>
                <option value="1">Axel BRAZEAU</option>
                <option value="2">Enzo FERRAND</option>
                <option value="3">Maxime BROCHARD</option>
                <option value="4">Adrien DECHARROIS</option>
            </select>
            <label>Elève absent</label>
        </div>
    </div>

    <div class="row center-align" style="padding-top: 32px;">
        <a class="waves-effect waves-light btn">Confirmer</a>
    </div>
</div>