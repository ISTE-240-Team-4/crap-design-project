DROP TABLE IF EXISTS principle_buttons, application_steps, principles, images, pages;

CREATE TABLE pages (
  `id`                  INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `mode`                VARCHAR(30) NOT NULL,
  `title`               VARCHAR(30) NOT NULL,
  `intro_heading`       TEXT NOT NULL,
  `intro_content`       TEXT NOT NULL,
  `summary`             TEXT,
  `conclusion_heading`  TEXT NOT NULL,
  `conclusion_content`  TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE images (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `file_path`   TINYTEXT NOT NULL,
  `caption`     TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE principles (
  `id`                  INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name`                VARCHAR(30) NOT NULL,
  `interaction_heading` TEXT NOT NULL,
  `definition`          TEXT NOT NULL,
  `before_image_id`     INT UNSIGNED NOT NULL, 
  `after_image_id`      INT UNSIGNED NOT NULL,
  `application_steps`   TEXT NOT NULL,

  FOREIGN KEY (before_image_id) REFERENCES images(id) ON DELETE RESTRICT,
  FOREIGN KEY (after_image_id) REFERENCES images(id) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE principle_buttons (
  `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `principle_id`  INT UNSIGNED NOT NULL,
  `name`          VARCHAR(30) NOT NULL,

  FOREIGN KEY (principle_id) REFERENCES principles(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- CREATE TABLE application_steps (
--   `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
--   `principle_id`  INT UNSIGNED NOT NULL,
--   `step_order`    TINYINT UNSIGNED NOT NULL,
--   `content`       TEXT NOT NULL,

--   FOREIGN KEY (principle_id) REFERENCES principles(id) ON DELETE CASCADE
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO pages (`mode`, `title`, `intro_heading`, `intro_content`, `summary`, `conclusion_heading`, `conclusion_content`)
  VALUES ('learn', 'this CRAP | Learn Mode', 'INTRODUCTION TO THIS CRAP.',
          "<p>
            Wouldn't it be great if there were a few simple rules that just worked every time you wanted something to look clean, organized, and professional?
          </p>
          <p>
            Great design is NOT about mastering complicated software; it's about using simple, consistent rules that make your work clear and credible. And that's what this CRAP — a quick, hands-on guide to the four essential design principles: Contrast, Repetition, Alignment, and Proximity.
          </p>
          <p>
            Whether you're a small business owner improving your website, a student building your first project, or a beginner designer refining your eye, these principles help you communicate ideas with impact. If the content looks more professional, it instantly becomes more influential.
          </p>
          <p>
            Here, you'll learn what each principle means, see it in action, and test yourself through short, interactive examples designed to make good design feel obvious.
          </p>",
          "<p>Design doesn't have to be complicated or intimidating. Once you understand the basics behind this CRAP, you start seeing design differently — you can actually tell what is off, not just what feels off.</p>
          <p>These four principles give structure to creativity. Once you begin applying them, you'll realize how often they appear everywhere, from websites and presentations to posters and social media posts.</p>
          <p>They aren't just <strong>design rules</strong>; they're <strong>thinking tools</strong>. Using them, you will be able to make deliberate visual choices that communicate ideas effectively. Once you learn to apply them, your work doesn't just look competent — it looks confident.</p>
          ",
          'ALREADY DONE?',
          "<p>Good job going through all the principles! Think you're ready to apply them like a pro? Head over to the <strong>quiz</strong> mode and put your eye for design to the test.</p>"
         ),
         ('practice', 'this CRAP | Practice Mode', 'PRACTICE WITH THIS CRAP.',
          "<p>
            Wouldn't it be great if there were a few simple rules that just worked every time you wanted something to look clean, organized, and professional?
          </p>
          <p>
            Great design is NOT about mastering complicated software; it's about using simple, consistent rules that make your work clear and credible. And that's what this CRAP — a quick, hands-on guide to the four essential design principles: Contrast, Repetition, Alignment, and Proximity.
          </p>
          <p>
            Whether you're a small business owner improving your website, a student building your first project, or a beginner designer refining your eye, these principles help you communicate ideas with impact. If the content looks more professional, it instantly becomes more influential.
          </p>
          <p>
            Here, you'll learn what each principle means, see it in action, and test yourself through short, interactive examples designed to make good design feel obvious.
          </p>",
          "<p>Design doesn't have to be complicated or intimidating. Once you understand the basics behind this CRAP, you start seeing design differently — you can actually tell what is off, not just what feels off.</p>
          <p>These four principles give structure to creativity. Once you begin applying them, you'll realize how often they appear everywhere, from websites and presentations to posters and social media posts.</p>
          <p>They aren't just <strong>design rules</strong>; they're <strong>thinking tools</strong>. Using them, you will be able to make deliberate visual choices that communicate ideas effectively. Once you learn to apply them, your work doesn't just look competent — it looks confident.</p>
          ",
          'ALREADY DONE?',
          "<p>Good job going through all the principles! Think you're ready to apply them like a pro? Head over to the <strong>quiz</strong> mode and put your eye for design to the test.</p>"
         ),
         ('quiz', 'this CRAP | Quiz Mode','TEST YOUR UNDERSTANDING WITH THIS CRAP.',
          "<p>
            Wouldn't it be great if there were a few simple rules that just worked every time you wanted something to look clean, organized, and professional?
          </p>
          <p>
            Great design is NOT about mastering complicated software; it's about using simple, consistent rules that make your work clear and credible. And that's what this CRAP — a quick, hands-on guide to the four essential design principles: Contrast, Repetition, Alignment, and Proximity.
          </p>
          <p>
            Whether you're a small business owner improving your website, a student building your first project, or a beginner designer refining your eye, these principles help you communicate ideas with impact. If the content looks more professional, it instantly becomes more influential.
          </p>
          <p>
            Here, you'll learn what each principle means, see it in action, and test yourself through short, interactive examples designed to make good design feel obvious.
          </p>",
          "<p>Design doesn't have to be complicated or intimidating. Once you understand the basics behind this CRAP, you start seeing design differently — you can actually tell what is off, not just what feels off.</p>
          <p>These four principles give structure to creativity. Once you begin applying them, you'll realize how often they appear everywhere, from websites and presentations to posters and social media posts.</p>
          <p>They aren't just <strong>design rules</strong>; they're <strong>thinking tools</strong>. Using them, you will be able to make deliberate visual choices that communicate ideas effectively. Once you learn to apply them, your work doesn't just look competent — it looks confident.</p>
          ",
          'ALREADY DONE?',
          "<p>Good job completing the quiz! How did you do? Feel free to head back over to the <strong>learn</strong> mode and refresh your understanding or the <strong>practice</strong> mode to experiment more with the principles or retake the quiz!</p>"
         );

INSERT INTO images (`file_path`, `caption`)
  VALUES ('assets/images/contrast-before.png', 'This image shows a circle with low contrast against its background, making it blend in and appear less noticeable.'),
         ('assets/images/contrast-after.png', 'This image shows a circle with high contrast against its background, making it stand out and draw attention.'),
         ('assets/images/repetition-before.png', 'This image shows shapes with no repetition, making the design feel random and less unified.'),
         ('assets/images/repetition-after.png', 'This image shows repeated shapes and colors, creating a sense of rhythm and unity in the composition.'),
         ('assets/images/alignment-before.png', 'This image shows shapes that are not aligned, making the composition look unorganized and uneven.'),
         ('assets/images/alignment-after.png', 'This image shows shapes that are neatly aligned, creating a clean and structured composition.'),
         ('assets/images/proximity-before.png', 'The shapes are placed close together, making them appear as if they all belong to the same group.'),
         ('assets/images/proximity-after.png', 'Adding more space between them reveals separate groupings and creates a clear structure.');

INSERT INTO principles (`name`, `interaction_heading`, `definition`, `before_image_id`, `after_image_id`, `application_steps`)
  VALUES (
          'Contrast',
          'CONTRAST CAN BE ACHIEVED IN MANY DIFFERENT WAYS. TRY OUT SOME OF THEM ON THIS SECTION.',
          'Alignment brings order to your design. When elements line up visually, they feel connected and intentional, which makes them easier to follow. Even a small misalignment can make a design look off-balance and distract the viewer. Proper alignment is what makes a layout effortless to read.',
          '1', '2',
          "<li>Use strong color differences between text and background.</li>
          <li>Make key elements (like titles or buttons) larger, bolder, or brighter.</li>
          <li>If two things aren't meant to look the same, make them very different. Subtle contrast looks like a mistake; strong contrast looks intentional.</li>"
         ),
         (
          'Repetition',
          'REPETITION CAN BE USED IN VARIOUS PLACES. TRY IT OUT ON THIS SECTION.',
          'Repetition creates unity. When certain traits and elements — like colors, fonts, or layouts — appear consistently, your design feels cohesive and deliberate. It helps users recognize patterns faster and understand how the content is organized.',
          '3', '4',
          "<li>Repeat fonts, colors, and shapes throughout your design.</li>
          <li>Use consistent button styles, icon sizes, and spacing.</li>
          <li>Carry the same visual patterns across pages or slides.</li>"
         ),
         (
          'Alignment',
          'ALIGNMENT CAN BE APPLIED TO VARIOUS ELEMENTS. TRY IT OUT ON THIS SECTION.',
          'Alignment brings order to your design. When elements line up visually, they feel connected and intentional, which makes them easier to follow. Even a small misalignment can make a design look off-balance and distract the viewer. Proper alignment is what makes a layout effortless to read.',
          '5', '6',
          "<li>Use grids or guides to align text, images, and buttons.</li>
          <li>Stick to one main alignment style (left, center, or right) and stay consistent.</li>
          <li>Line things up so every element feels connected; nothing should look like it's drifting away.</li>"
         ),
         (
          'Proximity',
          'PROXIMITY CAN BE APPLIED BETWEEN VARIOUS ELEMENTS. TRY IT OUT ON THIS SECTION AND OBSERVE BELOW.',
          'Proximity is the principle of relationships. Elements that are close together feel connected; elements that are far apart feel unrelated. By controlling proximity, you visually organize content so users can instantly correctly assume what belongs together.',
          '7', '8',
          "<li>Group related elements (like a product name, price, and button) close together.</li>
          <li>Use white space to separate different sections or ideas.</li>
          <li>Keep consistent spacing patterns across your design for visual clarity.</li>"
         );

INSERT INTO principle_buttons (`principle_id`, `name`)
  VALUES ('1', 'SIZE'),
         ('1', 'COLOR'),
         ('2', 'TYPEFACE'),
         ('2', 'COLOR'),
         ('3', 'ELEMENTS'),
         ('3', 'TEXT'),
         ('4', 'DENSITY'),
         ('4', 'SPACING');