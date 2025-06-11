<div class="modal fade" id="makeAppointment" tabindex="-1" aria-labelledby="makeAppointmentLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/schedule/appointment/save" method="POST">
                @csrf
                <input type="hidden" id="unitId" name="unitId">
                <div class="modal-header justify-content-center">
                    <h4 class="modal-title fs-3 text-center" id="makeAppointmentLabel">Agendar Horário</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="mb-3">
                            <label for="scheduleDay" class="form-label">No dia</label>
                            <input type="text" id="scheduleDay" name="scheduleDay" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="scheduleHour" class="form-label">No horário</label>
                            <input type="text" id="scheduleHour" name="scheduleHour" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-primary" value="Salvar">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const makeAppointment = document.getElementById('makeAppointment');
    makeAppointment.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        const hourString = button.getAttribute('data-hour');
        const hour = makeAppointment.querySelector('#scheduleHour');

        const dayString = button.getAttribute('data-day');
        const day = makeAppointment.querySelector('#scheduleDay');

        const unitId = button.getAttribute('data-unit-id');
        const unit = makeAppointment.querySelector('#unitId');

        hour.value = hourString;
        day.value = dayString;
        unit.value = unitId;
    });
</script>
