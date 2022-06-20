<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Liste des prestations</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php dump($parameters); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1>Liste des prestations</h1>
            </div>
        </div>
        <div class="col-xs-2">
            Filtre Chantier :
        </div>
        <div class="col-xs-4">
            <select class="form-control">
                <option>Tous</option>
                <?php foreach ($parameters['allWorksiteExist'] as $worksite) : ?>
                    <option> <?= $worksite ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-xs-2">
            Filtre Prestation :
        </div>
        <div class="col-xs-4">
            <select class="form-control">
                <option>Toutes</option>
                <?php foreach ($parameters['allServiceExist'] as $service) : ?>
                    <option><?= $service ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <table class="table table-striped table-responsive table-long">
            <thead>
                <tr>
                    <th style="width:30px">
                        <a href="#" class="" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle fa-2x"></i></a>
                    </th>
                    <th>Chantier</th>
                    <th>Prestation</th>
                    <th>Janv.</th>
                    <th>Fév.</th>
                    <th>Mars</th>
                    <th>Avril</th>
                    <th>Mai</th>
                    <th>Juin</th>
                    <th>Juil.</th>
                    <th>Août</th>
                    <th>Sept</th>
                    <th>Oct</th>
                    <th>Nov.</th>
                    <th>Déc.</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($parameters['worksiteAndServiceValues'] as $item) : ?>
                    <tr style="font-style:normal">
                        <td></td>
                        <td><?= $item['worksiteName'] ?></td>
                        <td><?= $item['serviceName'] ?></td>
                        <?php foreach ($item['months_list'] as $month) : ?>

                            <td><?= $month ?></td>

                        <?php endforeach; ?>
                        <td>
                            <a href="#" class="btn btn-xs btn-danger delete-button" data-idList=<?= json_encode($item['idList']); ?>><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!--main-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Gestion des prestations</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <form class="formulaire-custom" id="form-heures">
                                <div class="inline-form">
                                    <div class="" id="filtreHeure" style="margin: 10px 0px; padding-right: 0px;">
                                        <div class="form-group">
                                            <label for="" class="col-sm-1">Chantier</label>
                                            <div class="col-sm-4" id="select_chantier_container">
                                                <select class="form-control input-sm" name="heure_chantier" id="heure_chantier" type="text">
                                                    <?php foreach ($parameters['allWorksiteExist'] as $key => $worksite) : ?>
                                                        <option data-id=<?= $key ?>> <?= $worksite ?> </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <label for="" class="col-sm-1">Prestation</label>
                                            <div class="col-sm-4" id="select_chantier_container">
                                                <select class="form-control input-sm" name="heure_chantier" id="heure_chantier" type="text">
                                                    <?php foreach ($parameters['allServiceExist'] as $key => $service) : ?>
                                                        <option data-id=<?= $key ?>><?= $service ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">

                                            <hr style="margin:15px 0">
                                            <div class="form-group" id="form-heures-classiques">
                                                <div class="col-xs-2">
                                                    <label>Janvier</label>
                                                    <input class="form-control input-sm" id="heure_mois_1" name="heure_mois_1" value="0" type="text">
                                                </div>
                                                <div class="col-xs-2">
                                                    <label>Février</label>
                                                    <input class="form-control input-sm" id="heure_mois_2" name="heure_mois_2" value="0" type="text">
                                                </div>
                                                <div class="col-xs-2">
                                                    <label>Mars</label>
                                                    <input class="form-control input-sm" id="heure_mois_3" name="heure_mois_3" value="0" type="text">
                                                </div>
                                                <div class="col-xs-2">
                                                    <label>Avril</label>
                                                    <input class="form-control input-sm" id="heure_mois_4" name="heure_mois_4" value="0" type="text">
                                                </div>
                                                <div class="col-xs-2">
                                                    <label>Mai</label>
                                                    <input class="form-control input-sm" id="heure_mois_5" name="heure_mois_5" value="0" type="text">
                                                </div>
                                                <div class="col-xs-2">
                                                    <label>Juin</label>
                                                    <input class="form-control input-sm" id="heure_mois_6" name="heure_mois_6" value="0" type="text">
                                                </div>
                                                <div class="col-xs-2">
                                                    <label>Juillet</label>
                                                    <input class="form-control input-sm" id="heure_mois_7" name="heure_mois_7" value="0" type="text">
                                                </div>
                                                <div class="col-xs-2">
                                                    <label>Août</label>
                                                    <input class="form-control input-sm" id="heure_mois_8" name="heure_mois_8" value="0" type="text">
                                                </div>
                                                <div class="col-xs-2">
                                                    <label>Septembre</label>
                                                    <input class="form-control input-sm" id="heure_mois_9" name="heure_mois_9" value="0" type="text">
                                                </div>
                                                <div class="col-xs-2">
                                                    <label>Octobre</label>
                                                    <input class="form-control input-sm" id="heure_mois_10" name="heure_mois_10" value="0" type="text">
                                                </div>
                                                <div class="col-xs-2">
                                                    <label>Novembre</label>
                                                    <input class="form-control input-sm" id="heure_mois_11" name="heure_mois_11" value="0" type="text">
                                                </div>
                                                <div class="col-xs-2">
                                                    <label>Décembre</label>
                                                    <input class="form-control input-sm" id="heure_mois_12" name="heure_mois_12" value="0" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../../assets/js/script.js"></script>
</body>

</html>