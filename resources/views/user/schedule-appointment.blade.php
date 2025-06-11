@include("layout.header")
<div class="container-fluid mt-5">
    <h3>Unidade: <?= $name ?? null ?> - <?= $description ?? null ?></h3>

    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
            <tr>
                @foreach ($schedules as $dia => $horas)
                    <th><?= $dia ?></th>
                @endforeach
            </tr>

            <tr>
            @foreach ($hours as $hour)
                <tr>
                    @foreach ($schedules as $day => $horas)
                        <td>
                            @if (in_array($hour, $horas))
                                <button type="button"
                                        class="btn btn-primary"
                                        data-bs-toggle="modal"
                                        data-hour="<?=$hour?>"
                                        data-day="<?=$day?>"
                                        data-unit-id="<?=$unitId?>"
                                        data-bs-target="#makeAppointment">
                                        <?= $hour ?> - <?= $appointmentCounts[$day][$hour]  ?>
                                </button>
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </table>
    </div>
</div>

@include("user.make-appointment")
@include("layout.footer")
