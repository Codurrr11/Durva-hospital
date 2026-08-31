<?php
/*
  include/legal-data.php — the three policy documents.

  Same shape as include/blog-data.php: one accessor, one whitelist, content as
  structured blocks rather than as a blob of HTML. When these move to a CMS or
  a table, replace the body of legal_all() and nothing else changes.

  A section is ['heading' => string, 'blocks' => [[type, value], ...]] and the
  block types are the same four blog-data uses — 'p', 'list', 'note' — so the
  renderer stays small and no page can invent its own markup.

  FIELD NAMES ASSUMED (confirm before wiring a DB):
    slug, title, kicker, summary, updated_at, sections[heading, blocks]

  A NOTE ON THE CONTENT ITSELF. This is ordinary, honest boilerplate written
  to describe how a small hospital site like this one actually behaves. It is
  NOT legal advice and it has not been reviewed by anyone qualified. Two
  things in particular need a real decision before this goes live:

    - the grievance/complaint timelines and the named officer,
    - whether the site sets any analytics cookie at all (today it does not,
      and the copy says so — if that changes, the copy has to change with it).
*/

if (!function_exists('legal_all')) {

    /** @return array<string,array> keyed by slug */
    function legal_all(): array
    {
        $hospital = 'Durva Hospital';

        return [

            /* ============================================================ */
            'privacy' => [
                'title'      => 'Privacy Policy',
                'kicker'     => 'How we handle your information',
                'summary'    => 'What we collect when you use this website or book an appointment, why we hold it, who can see it, and how to ask us to change or delete it.',
                'updated_at' => '2026-08-31',
                'sections'   => [

                    [
                        'heading' => 'What this policy covers',
                        'blocks'  => [
                            ['p', 'This policy covers ' . $hospital . '\'s website and the appointment enquiry form on it. It does not cover your clinical records, which are held separately under the confidentiality rules that apply to medical practice in India and are not accessible from this website.'],
                            ['p', 'If you have contacted us by phone or visited the hospital, the information you gave in person is handled under those clinical rules rather than under this policy.'],
                        ],
                    ],

                    [
                        'heading' => 'Information we collect',
                        'blocks'  => [
                            ['p', 'We collect only what a request needs in order to be answered:'],
                            ['list', [
                                'Your name, phone number and email address, when you submit the appointment form.',
                                'The department or procedure you have asked about, and any preferred date.',
                                'Anything you choose to write in the message field — please do not put detailed medical history there.',
                            ]],
                            ['p', 'We do not ask for identity numbers, insurance details or payment information anywhere on this website. If a page ever appears to, it is not ours — close it and call us on the number in the footer.'],
                        ],
                    ],

                    [
                        'heading' => 'Cookies and analytics',
                        'blocks'  => [
                            ['note', 'This website sets no advertising or tracking cookies, and we do not sell or share your information with advertisers. Ever.'],
                            ['p', 'Fonts are loaded from Google Fonts and some photographs are served from a stock image provider. Those services see your IP address as part of delivering the file, in the same way any website request works. We receive nothing from them about you.'],
                        ],
                    ],

                    [
                        'heading' => 'Why we hold it, and for how long',
                        'blocks'  => [
                            ['p', 'An enquiry is held so that we can respond to it and so there is a record of what was arranged. Once an enquiry has been closed and no appointment followed, we keep it for twelve months and then delete it.'],
                            ['p', 'Where an appointment did follow, the relevant details move into your hospital record and are kept for as long as medical record retention requires.'],
                        ],
                    ],

                    [
                        'heading' => 'Who can see it',
                        'blocks'  => [
                            ['p', 'Enquiries are visible to the reception and clinical staff who need them to do their job, and to nobody else. We do not pass your information to third parties for their own purposes.'],
                            ['p', 'We may have to disclose information where a court, a regulator or the law requires it. If that happens and we are permitted to tell you, we will.'],
                        ],
                    ],

                    [
                        'heading' => 'Your choices',
                        'blocks'  => [
                            ['p', 'You can ask us to do any of the following, and we will act on it within thirty days:'],
                            ['list' , [
                                'Tell you what enquiry information we hold about you.',
                                'Correct anything that is wrong.',
                                'Delete an enquiry, where we are not required to keep it.',
                                'Stop contacting you about an enquiry you no longer want followed up.',
                            ]],
                            ['p', 'Ask by phone or email using the contact details in the footer. We may need to confirm who you are first, which protects you rather than us.'],
                        ],
                    ],

                    [
                        'heading' => 'Security',
                        'blocks'  => [
                            ['p', 'Enquiry details are kept on systems that only authorised staff can reach. No system is perfect, and we would rather say that plainly than claim otherwise. If we ever became aware of a breach affecting your information, we would tell you.'],
                        ],
                    ],

                    [
                        'heading' => 'Changes to this policy',
                        'blocks'  => [
                            ['p', 'When this policy changes, the date at the top of the page changes with it. Material changes will be announced on the website rather than made quietly.'],
                        ],
                    ],
                ],
            ],

            /* ============================================================ */
            'terms' => [
                'title'      => 'Terms & Conditions',
                'kicker'     => 'Using this website',
                'summary'    => 'The terms you accept by using this website, what the information on it is and is not, and where our responsibility begins and ends.',
                'updated_at' => '2026-08-31',
                'sections'   => [

                    [
                        'heading' => 'Agreement',
                        'blocks'  => [
                            ['p', 'By using this website you accept these terms. If you do not accept them, please do not use the site — you are welcome to call us instead.'],
                        ],
                    ],

                    [
                        'heading' => 'The information here is not medical advice',
                        'blocks'  => [
                            ['note', 'Nothing on this website is a diagnosis, a treatment plan, or a substitute for being examined by a doctor. If you are in pain, if a joint has given way, or if something has changed suddenly, be seen — do not read.'],
                            ['p', 'The procedure and condition pages describe what we do in general terms. They cannot account for your history, your imaging or your examination, and no two knees are the same. Any decision about your treatment is made in the clinic, with you.'],
                            ['p', 'In an emergency, go to the nearest emergency department. Do not use the appointment form.'],
                        ],
                    ],

                    [
                        'heading' => 'Appointment enquiries',
                        'blocks'  => [
                            ['p', 'The form on this website is an enquiry, not a confirmed booking. An appointment exists once we have contacted you and agreed a time — not when you press submit.'],
                            ['list', [
                                'We aim to respond to enquiries within one working day.',
                                'Slots are subject to surgeon availability and clinical priority.',
                                'Please tell us as early as you can if you cannot attend, so the slot can go to someone else.',
                            ]],
                        ],
                    ],

                    [
                        'heading' => 'Accuracy and availability',
                        'blocks'  => [
                            ['p', 'We keep this site accurate and current as best we can, but we do not warrant that every page is free of error or that the site will always be available. Timings, fees and the services offered can change.'],
                        ],
                    ],

                    [
                        'heading' => 'Content and images',
                        'blocks'  => [
                            ['p', 'The text, layout and branding on this site belong to ' . $hospital . '. You may read, print and share pages for your own use. You may not republish them commercially or present them as your own.'],
                            ['p', 'Some photographs are licensed stock images used to illustrate a setting. Where a photograph shows a patient, it was taken and published with that person\'s written consent.'],
                        ],
                    ],

                    [
                        'heading' => 'Links to other sites',
                        'blocks'  => [
                            ['p', 'Where we link somewhere else, we do so because it seemed useful. We do not control those sites and are not responsible for what they publish or how they handle your information.'],
                        ],
                    ],

                    [
                        'heading' => 'Liability',
                        'blocks'  => [
                            ['p', 'We are not liable for loss arising from reliance on the general information published here, as distinct from the care we actually provide to you. Nothing in these terms limits our liability for our own clinical negligence, and nothing in them limits any right you have that cannot lawfully be limited.'],
                        ],
                    ],

                    [
                        'heading' => 'Governing law',
                        'blocks'  => [
                            ['p', 'These terms are governed by the laws of India, and the courts at Kota, Rajasthan have jurisdiction over any dispute arising from them.'],
                        ],
                    ],
                ],
            ],

            /* ============================================================ */
            'patient-rights' => [
                'title'      => 'Patient Rights',
                'kicker'     => 'What you are entitled to expect',
                'summary'    => 'Your rights as a patient here, the responsibilities that sit alongside them, and how to raise something when we have got it wrong.',
                'updated_at' => '2026-08-31',
                'sections'   => [

                    [
                        'heading' => 'Care and dignity',
                        'blocks'  => [
                            ['p', 'You are entitled to be treated with respect, whatever your background, beliefs, income or condition. That includes privacy during examination, a chaperone if you want one, and being spoken to in a language you understand.'],
                        ],
                    ],

                    [
                        'heading' => 'Information and consent',
                        'blocks'  => [
                            ['p', 'Before any procedure you are entitled to know, in plain language:'],
                            ['list', [
                                'What is being proposed, and what it is meant to achieve.',
                                'What the realistic alternatives are, including doing nothing for now.',
                                'What the risks are, and how likely they actually are.',
                                'Who will be performing it.',
                                'What it will cost, before it begins.',
                            ]],
                            ['note', 'Consent given without those answers is not consent. Ask until you understand, and take the time you need — a decision that is not urgent should not be made in a corridor.'],
                        ],
                    ],

                    [
                        'heading' => 'A second opinion',
                        'blocks'  => [
                            ['p', 'You may seek another opinion at any point, including after we have recommended surgery. Say so and we will provide your reports and imaging to take with you. It is your right and it is not held against you.'],
                        ],
                    ],

                    [
                        'heading' => 'Refusing treatment',
                        'blocks'  => [
                            ['p', 'You may decline any investigation or procedure, and you may withdraw consent you have already given. We will explain what we think the consequences are, and then we will respect the decision.'],
                        ],
                    ],

                    [
                        'heading' => 'Your records',
                        'blocks'  => [
                            ['p', 'You are entitled to a copy of your own records, discharge summary, operation notes and imaging. Ask at reception. We may charge the cost of reproduction and nothing beyond it.'],
                        ],
                    ],

                    [
                        'heading' => 'Costs',
                        'blocks'  => [
                            ['p', 'You are entitled to an estimate before admission, an itemised bill afterwards, and an explanation of anything on it you do not recognise.'],
                        ],
                    ],

                    [
                        'heading' => 'What we ask of you',
                        'blocks'  => [
                            ['p', 'Rights work in both directions, and these are the things that materially change your result:'],
                            ['list', [
                                'Tell us your full history and every medicine you take, including the ones you would rather not mention.',
                                'Follow the rehabilitation plan — most orthopaedic outcomes are decided after the operation, not during it.',
                                'Keep your appointments, or cancel them early enough for someone else to use the slot.',
                                'Treat our staff and other patients with the same respect you expect.',
                            ]],
                        ],
                    ],

                    [
                        'heading' => 'If something goes wrong',
                        'blocks'  => [
                            ['p', 'Tell us. Raise it with the staff member involved or ask for the person in charge that day — most things are resolved on the spot. If it is not resolved, put it in writing to us using the contact details in the footer and we will acknowledge it within three working days and respond within fifteen.'],
                            ['p', 'You may also approach the Rajasthan Medical Council or the relevant consumer forum. Complaining to us does not affect your care, and you will not be treated differently for having done it.'],
                        ],
                    ],
                ],
            ],
        ];
    }

    /** One document, or null when the slug is unknown. */
    function legal_find(string $slug): ?array
    {
        $all = legal_all();
        return $all[$slug] ?? null;
    }

    /** The other two, for the footer of each document. */
    function legal_siblings(string $exclude): array
    {
        $out = [];
        foreach (legal_all() as $slug => $doc) {
            if ($slug !== $exclude) {
                $out[$slug] = $doc;
            }
        }
        return $out;
    }
}
