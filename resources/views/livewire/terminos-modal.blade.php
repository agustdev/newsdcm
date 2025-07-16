<div>
    <a wire:click.prevent="$set('terminoModal', true)" href="#"
        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
        {{ __('Términos y condiciones del servicio') }}
    </a>
    <x-dialog-modal-term wire:model="terminoModal">
        <x-slot name="title">
            <h2 class="text-2xl font-extrabold ">
                {{ __('Términos y condiciones del servicio') }}
            </h2>
        </x-slot>

        <x-slot name="content">
            <strong class="inline-block mb-4">1. Aceptación de los Términos</strong>
            <p class="text-justify text-gray-500">
                Al acceder y utilizar el Sistema de Conduce y Despacho de Embarcaciones (DESPACHORD), Armada de
                República Dominicana, usted acepta cumplir con todos los Términos y Condiciones establecidos en el
                presento documento.
            </p>
            <strong class="inline-block mb-4 mt-4">2. Descripción del Servicio</strong>
            <p class="text-justify text-gray-500">
                DESPACHORD, es una plataforma tecnológica de servicios en línea, diseñada para facilitar la gestión de
                solicitudes de Conduce y Despacho de Embarcaciones, permitiendo a los usuarios realizar trámites de
                manera eficiente y segura sin la necesidad de tener que trasladarse a una Marina, Capitanías de Puerto,
                Puestos o Destacamentos de la Armada de Republica Dominicana. Este servicio está destinado a los
                ciudadanos y empresas que poseen embarcaciones Registradas a su nombre en el Comando Naval de Capitanías
                de Puertos y Autoridad Marítima de la Armada de Republica Dominicana.
            </p>
            <strong class="inline-block mb-4 mt-4">3. Registro de Usuarios</strong>
            <p class="text-justify text-gray-500">
                Para utilizar ciertas funciones del sistema, es posible que se requiera el registro como usuario. Al
                registrarse, usted se compromete a proporcionar información precisa, actual y completa. Es su
                responsabilidad mantener la confidencialidad de su información de acceso y notificar a la Armada de la
                República Dominicana sobre cualquier uso no autorizado de su cuenta.
            </p>
            <strong class="inline-block mb-4 mt-4">4. Uso del Servicio</strong>
            <p class="text-justify text-gray-500">
                El usuario se compromete a utilizar el servicio de manera legal y ética, y se abstendrá de realizar
                actividades que puedan comprometer la seguridad, la integridad o el funcionamiento del sistema. Esto
                incluye, pero no se limita a:
            <ul class="ml-8">
                <li class="list-disc ml-2">Realizar actividades fraudulentas o engañosas.</li>
                <li class="list-disc ml-2">Introducir virus, malware u otros códigos dañinos.</li>
                <li class="list-disc ml-2">Intentar acceder a cuentas de otros usuarios sin autorización.</li>
            </ul>
            </p>
            <strong class="inline-block mb-4 mt-4">5. Propiedad Intelectual</strong>
            <p class="text-justify text-gray-500">
                Todos los contenidos, marcas registradas, logos y materiales disponibles en el p, plataforma tecnológica
                (DESPACHORD), son propiedad de la Armada de la República Dominicana, o de terceros que han otorgado
                licencia para tales fines. Queda prohibida la reproducción total o parcial de cualquier contenido sin el
                consentimiento previo por escrito de la Armada de República Dominicana.
            </p>
            <strong class="inline-block mb-4 mt-4">6. Modificaciones al Servicio</strong>
            <p class="text-justify text-gray-500">
                La Armada de la República Dominicana, se reserva el derecho de modificar, suspender o descontinuar el
                servicio, total o parcialmente, en cualquier momento y sin previo aviso, si así lo fuere necesario. No
                seremos responsables ante usted ni ante terceros por cualquier violación, modificación, suspensión o
                interrupción del servicio.
            </p>
            <strong class="inline-block mb-4 mt-4">7. Limitación de Responsabilidad</strong>
            <p class="text-justify text-gray-500">
                En la máxima medida permitida por la ley, la Armada de la República Dominicana no será responsable por
                daños
                directos, indirectos, incidentales, especiales o consecuentes que resulten del uso o la imposibilidad de
                uso
                del servicio.
            </p>
            <strong class="inline-block mb-4 mt-4">8. Ley Aplicable</strong>
            <p class="text-justify text-gray-500">
                Estos Términos y Condiciones se rigen por las leyes de la República Dominicana. Cualquier disputa que
                surja
                en relación con estos términos, serán resueltos en los tribunales competentes de la República
                Dominicana.
            </p>
            <strong class="inline-block mb-4 mt-4">
                9. Cambios a los Términos y Condiciones
            </strong>
            <p class="text-justify text-gray-500">
                La Armada de la República Dominicana, se reserva el derecho de modificar estos Términos y Condiciones en
                cualquier momento. Los cambios serán efectivos una vez publicados en el sitio web o sus redes sociales.
                Se
                recomienda a los usuarios revisar periódicamente los términos para estar informados sobre cualquier
                actualización.
            </p>
            <strong class="inline-block mb-4 mt-4">10. Contacto</strong>
            <p class="text-justify text-gray-500">
                Si tiene alguna pregunta o inquietud sobre estos Términos y Condiciones, puede ponerse en contacto con
                nosotros a través de (email: info@despachord.com o al Teléfono 809-593-5900).
            </p>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="accept_c" wire:click="$set('terminoModal', false)" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-button-register class="ml-3 accept_t" wire:click="$set('terminoModal', false)"
                wire:loading.attr="disabled" x-bind:checked="terms">
                {{ __('Aceptar') }}
            </x-button-register>
        </x-slot>
    </x-dialog-modal-term>
</div>
