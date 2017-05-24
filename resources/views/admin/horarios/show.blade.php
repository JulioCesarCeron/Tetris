@extends('master')
@section('title', 'Horários')

@section('content')
    <div class="container">


        <div class="well well bs-component">
            <div class="content">
                <h2 class="header"> Turma: {{$horario->turma->turma}} </h2>
                 <h2 class="header"> Serie: {{$horario->turma->serie}} </h2>
            </div>           
        </div>
        

        <div class="well well bs-component">
            <div id="calendar"></div>

            <table class="table table-calendar">
               <tbody>
                  <tr>
                     <td></td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="seg_per_1" class="control-label required">1° Período</label>
                           {{$horario->seg_per_1_materia->materia}}
                        </div>
                     </td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="ter_per_1" class="control-label required">1° Período</label>
                           {{$horario->ter_per_1_materia->materia}}
                        </div>
                     </td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="quar_per_1" class="control-label required">1° Período</label>
                           {{$horario->quar_per_1_materia->materia}}
                        </div>
                     </td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="quin_per_1" class="control-label required">1° Período</label>
                           {{$horario->quin_per_1_materia->materia}}
                        </div>
                     </td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="sex_per_1" class="control-label required">1° Período</label>
                           {{$horario->sex_per_1_materia->materia}}
                        </div>
                     </td>
                     <td></td>
                  </tr>
                  <tr>
                     <td></td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="seg_per_2" class="control-label required">2° Período</label>
                           {{$horario->seg_per_2_materia->materia}}
                        </div>
                     </td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="ter_per_2" class="control-label required">2° Período</label>
                           {{$horario->ter_per_2_materia->materia}}
                        </div>
                     </td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="quar_per_2" class="control-label required">2° Período</label>
                           {{$horario->quar_per_2_materia->materia}}
                        </div>
                     </td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="quin_per_2" class="control-label required">2° Período</label>
                           {{$horario->quin_per_2_materia->materia}}
                        </div>
                     </td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="sex_per_2" class="control-label required">2° Período</label>
                           {{$horario->sex_per_2_materia->materia}}
                        </div>
                     </td>
                     <td></td>
                  </tr>
                  <tr>
                     <td></td>
                     <td>-------</td>
                     <td>-------</td>
                     <td>-------</td>
                     <td>-------</td>
                     <td>-------</td>
                     <td></td>
                  </tr>
                  <tr>
                     <td></td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="seg_per_3" class="control-label required">3° Período</label>
                           {{$horario->seg_per_3_materia->materia}}
                        </div>
                     </td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="ter_per_3" class="control-label required">3° Período</label>
                           {{$horario->ter_per_3_materia->materia}}
                        </div>
                     </td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="quar_per_3" class="control-label required">3° Período</label>
                           {{$horario->quar_per_3_materia->materia}}
                        </div>
                     </td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="quin_per_3" class="control-label required">3° Período</label>
                           {{$horario->quin_per_3_materia->materia}}
                        </div>
                     </td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="sex_per_3" class="control-label required">3° Período</label>
                           {{$horario->sex_per_3_materia->materia}}
                        </div>
                     </td>
                     <td></td>
                  </tr>
                  <tr>
                     <td></td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="seg_per_4" class="control-label required">4° Período</label>
                           {{$horario->seg_per_4_materia->materia}}
                        </div>
                     </td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="ter_per_4" class="control-label required">4° Período</label>
                           {{$horario->ter_per_4_materia->materia}}
                        </div>
                     </td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="quar_per_4" class="control-label required">4° Período</label>
                           {{$horario->quar_per_4_materia->materia}}
                        </div>
                     </td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="quin_per_4" class="control-label required">4° Período</label>
                           {{$horario->quin_per_4_materia->materia}}
                        </div>
                     </td>
                     <td>
                        <div class="dia-per-calendario">
                           <label for="sex_per_4" class="control-label required">4° Período</label>
                           {{$horario->sex_per_4_materia->materia}}
                        </div>
                     </td>
                     <td></td>
                  </tr>
               </tbody>
            </table>
        </div>
    </div>
@endsection