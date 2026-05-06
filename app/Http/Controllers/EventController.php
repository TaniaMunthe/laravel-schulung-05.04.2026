<?php

namespace App\Http\Controllers;

use App\Enums\EventType;
use App\Exceptions\UnableToCreateEventException;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\EditEventRequest;
use App\Interfaces\Services\EventServiceInterface;
use App\Models\Event;
use App\Models\Trainer;
use App\Services\EventService;
use GuzzleHttp\Promise\Create;
use Illuminate\View\View;

class EventController extends Controller
{

    public function __construct(
        protected EventServiceInterface $service   // muss in AppServiceProvider in register function define
    ) { }

    public function index(): View

    {
        $events = $this->service->getEvents();
        // $trainer = Trainer::find(2);
        // $events = Event::query()->with(Event::RELATION_TRAINER)->get();
        //$events = Event::upcoming()->with(Event::RELATION_TRAINER)->get();
        //$events = Event::fromTrainer($trainer)->with(Event::RELATION_TRAINER)->get();
        //$events = Event::upcoming()->fromTrainer($trainer)->with(Event::RELATION_TRAINER)->get();

        return view('events.index', [
            'title' => 'GFU Training Schedule',
            'events' => $events,
        ]);
    }

    public function create(): View
    {
        return $this->form();
    }

    public function store(CreateEventRequest $request)
    {
        $data = $request->validated();
        $redirection = redirect()->route('events.index');

        try {
            $event = $this->service->createEvent($data);
        } catch (UnableToCreateEventException $e) {
            return $redirection->with('error', __('Unable to create event.'));
        }


        /*$event = new Event();
        $event->fill($data); */

        if ($event->save()) {
            return $redirection->with('success', 'Event created successfully.');
        }

        return $redirection->with('error', 'Unable to create event.');
    }

    public function edit(Event $event): View
    {
        return $this->form([
            'event' => $event,
        ]);
    }

    private function form(array $data = []): View
    {
        return view('events.form', array_merge([
            'trainers' => Trainer::all(),
            'types' => EventType::cases(),
        ], $data));
    }

    public function save(Event $event, EditEventRequest $request)
    {
        $data = $request->validated();

        $event->fill($data);

        $redirection = redirect()->route('events.index');

        if ($event->save()) {
            return $redirection->with('success', __('Event ":event" updated successfully.', ['event' => $event]));
        }

        return $redirection->with('error', __('Unable to update event ".event".', ['event' => $event]));
    }

    public function remove(Event $event)
    {
        $redirection = redirect()->route('events.index');
        if ($event->delete()) {
            $redirection->with('success',  __('Event ":event" removed successfully.', ['event' => $event->title ]));
        } else {
            $redirection->with('error', __('Unable to remove event.', ['event' => $event->title]));
        }
        return $redirection;
    }
}
