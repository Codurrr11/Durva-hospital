<?php
/*
  include/blog-data.php — the single source for blog content.

  THIS IS THE DATABASE STAND-IN. There is no DB layer in the project yet
  (include/config.php is an empty stub, no PDO/mysqli anywhere), so the posts
  live here and both the home-page slider and blog-detail.php read from this
  one file rather than each keeping a copy.

  When the table exists, replace the body of blog_all() with the query and
  nothing else changes — every consumer already goes through these three
  functions and uses the same field names.

  FIELD NAMES ASSUMED (confirm before wiring the DB):
    slug, title, excerpt, category, author, published_at, image, image_alt,
    body  — body is an ordered list of blocks: ['h2'|'p'|'quote'|'list', value]
*/

if (!function_exists('blog_all')) {

    /** @return array<string,array> keyed by slug, newest first */
    function blog_all(): array
    {
        return [
            'knee-pain-more-than-wear-and-tear' => [
                'title'        => 'When Knee Pain Means More Than Wear and Tear',
                'excerpt'      => 'The signs that separate everyday stiffness from a ligament injury worth scanning.',
                'category'     => 'Knee Care',
                'author'       => 'Dr. Hitesh Mangal',
                'published_at' => '2026-02-18',
                'image'        => 6129444,
                'image_alt'    => 'A surgeon discussing knee imaging with a patient',
                'body'         => [
                    ['p', 'Most knee pain settles. It aches after a long day, it stiffens in the cold, it eases with movement and a few quiet days. That pattern is common and it rarely needs a scan.'],
                    ['p', 'What changes the picture is not how much it hurts. It is what the knee does.'],
                    ['h2', 'The signs worth acting on'],
                    ['list', [
                        'The knee gives way, or you catch yourself bracing for it on stairs.',
                        'It locks, or will not straighten fully compared with the other side.',
                        'It swelled within a few hours of a specific incident rather than gradually.',
                        'You heard or felt a pop at the moment of injury.',
                    ]],
                    ['p', 'Any one of those points at a structural problem — a ligament, a meniscus, or cartilage — rather than at wear. They are worth an examination, and often imaging, because the treatment is different.'],
                    ['h2', 'Why swelling timing matters'],
                    ['p', 'Swelling that appears within a couple of hours usually means bleeding inside the joint, and that narrows the list considerably. Swelling that builds over a day or two is more often inflammatory and less specific. It is one of the first things we ask about, and it is worth noting at the time because it is hard to recall accurately weeks later.'],
                    ['quote', 'A scan tells you what a structure looks like. The examination tells you what the knee actually does. Both matter, and the order matters too.'],
                    ['h2', 'What an assessment involves'],
                    ['p', 'A first appointment is an examination, not a booking for an operation. We test the ligaments directly, look at how you load the leg, and review any imaging you already have. Bring the films and the reports if you have them — repeating investigations that have already been done wastes your time and money.'],
                    ['p', 'If the answer is rest, rehabilitation and a review in six weeks, that is what you will be told. A large part of what comes through the clinic never needs surgery.'],
                ],
            ],

            'first-six-weeks-after-surgery' => [
                'title'        => 'What the First Six Weeks After Surgery Look Like',
                'excerpt'      => 'A week-by-week picture of what to expect, and what should worry you.',
                'category'     => 'Recovery',
                'author'       => 'Dr. Khushboo Jain',
                'published_at' => '2026-02-04',
                'image'        => 5793792,
                'image_alt'    => 'A therapist supporting a patient through post-operative stretching',
                'body'         => [
                    ['p', 'The first six weeks after joint surgery are the part patients ask about most and hear about least. Here is the shape of it, with the caveat that your own timeline is set at each follow-up rather than in advance.'],
                    ['h2', 'Week one'],
                    ['p', 'Swelling and stiffness peak. The work is elevation, ice, and getting the joint moving gently within whatever range you have been given. Most patients are up and moving with support the same day or the next.'],
                    ['h2', 'Weeks two and three'],
                    ['p', 'Sutures come out and the wound stops being the limiting factor. Range of movement becomes the focus. Full extension matters more than most people expect — a knee that does not straighten fully at this stage tends to stay that way without deliberate work.'],
                    ['h2', 'Weeks four to six'],
                    ['p', 'Strength work begins in earnest and most patients are walking without aids. This is where the temptation to do too much appears, and where a structured programme earns its place.'],
                    ['quote', 'Early movement is deliberate, not a shortcut. Controlled loading protects the repair and keeps the joint from stiffening.'],
                    ['h2', 'What should worry you'],
                    ['list', [
                        'Fever, or a wound that becomes hot, red or starts discharging.',
                        'Calf pain and swelling, particularly one-sided.',
                        'Pain that climbs steadily rather than settling week on week.',
                        'A sudden loss of movement you had already regained.',
                    ]],
                    ['p', 'None of those are things to wait out until the next appointment. Call the clinic.'],
                ],
            ],

            'arthroscopy-explained-without-jargon' => [
                'title'        => 'Arthroscopy, Explained Without the Jargon',
                'excerpt'      => 'Why a keyhole procedure often beats open surgery on the shoulder.',
                'category'     => 'Shoulder',
                'author'       => 'Dr. Hitesh Mangal',
                'published_at' => '2026-01-21',
                'image'        => 6129197,
                'image_alt'    => 'A surgical team reviewing imaging before a procedure',
                'body'         => [
                    ['p', 'Arthroscopy means working inside a joint through small incisions, using a camera rather than opening the joint up. On the shoulder it has become the default for most soft-tissue work, and the reasons are practical rather than technological.'],
                    ['h2', 'What actually changes'],
                    ['list', [
                        'The muscle around the joint is not divided, so it does not have to heal.',
                        'Less scarring inside the joint, which matters for range of movement.',
                        'A shorter stay, and usually a same-day discharge.',
                        'A clearer view of the joint surfaces than an open approach gives.',
                    ]],
                    ['p', 'That last point is the one people find surprising. A camera placed inside the joint sees more than an eye looking into an opening, which is why some problems are only fully characterised once the scope is in.'],
                    ['h2', 'What it does not change'],
                    ['p', 'Keyhole surgery is still surgery. The tendon or ligament that was repaired heals on its own biological timeline, and that timeline is not shortened by the size of the incision. Rehabilitation is the same length either way.'],
                    ['quote', 'Smaller incisions change how quickly you feel better. They do not change how quickly the repair is actually strong.'],
                    ['h2', 'When open surgery is still the right answer'],
                    ['p', 'Large or long-standing tears, revision cases, and some fractures are better served open. The approach is chosen on what the joint needs, not on what sounds less invasive.'],
                ],
            ],

            'returning-to-sport-after-acl-repair' => [
                'title'        => 'Returning to Sport After an ACL Repair',
                'excerpt'      => 'How we decide when an athlete is genuinely ready to play again.',
                'category'     => 'Sports',
                'author'       => 'Dr. Hitesh Mangal',
                'published_at' => '2026-01-09',
                'image'        => 6111589,
                'image_alt'    => 'A trainer guiding a patient through a rehabilitation exercise',
                'body'         => [
                    ['p', 'Return to pivoting sport after an ACL reconstruction is typically somewhere between nine and twelve months. That range is not the answer, though. The date is not what clears you.'],
                    ['h2', 'Testing, not the calendar'],
                    ['p', 'Clearance is decided on what the leg can do measured against the other side. Strength symmetry, hop testing and movement quality all have to reach target before we sign anything off.'],
                    ['list' , [
                        'Quadriceps and hamstring strength within a set margin of the uninjured leg.',
                        'Single-leg hop distance and control, tested in several directions.',
                        'Landing mechanics under fatigue, not fresh.',
                        'Confidence — a knee you do not trust changes how you move on it.',
                    ]],
                    ['quote', 'Returning on a date instead of on readiness is the single largest risk factor for a re-tear.'],
                    ['h2', 'Why fatigue testing matters'],
                    ['p', 'Most re-injuries do not happen in the first minute of play. Testing someone rested tells you very little about what their knee does in the eightieth minute, which is why the later stages of the programme deliberately test tired.'],
                    ['h2', 'The graft is not the whole story'],
                    ['p', 'A well-placed graft is necessary and not sufficient. The muscle around the joint, the mechanics of how you land and change direction, and the time given to both are what carry the result. That is why the rehabilitation plan is written at the same time as the operation is planned, rather than handed over afterwards.'],
                ],
            ],
        ];
    }

    /** One post, or null when the slug is unknown. */
    function blog_find(string $slug): ?array
    {
        $all = blog_all();
        return $all[$slug] ?? null;
    }

    /** Newest posts, excluding one slug. Used by the sidebar widget. */
    function blog_recent(string $exclude = '', int $limit = 3): array
    {
        $out = [];
        foreach (blog_all() as $slug => $post) {
            if ($slug === $exclude) {
                continue;
            }
            $out[$slug] = $post;
            if (count($out) >= $limit) {
                break;
            }
        }
        return $out;
    }

    /** Categories with a live count, derived from the posts themselves. */
    function blog_categories(): array
    {
        $counts = [];
        foreach (blog_all() as $post) {
            $name = $post['category'];
            $counts[$name] = ($counts[$name] ?? 0) + 1;
        }
        arsort($counts);
        return $counts;
    }

    /** Reading time from the actual body text, so it can never be wrong. */
    function blog_read_time(array $post): int
    {
        $words = 0;
        foreach ($post['body'] as [$type, $value]) {
            $text = is_array($value) ? implode(' ', $value) : $value;
            $words += str_word_count(strip_tags($text));
        }
        return max(1, (int) ceil($words / 200));
    }
}
