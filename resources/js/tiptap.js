import { Editor } from "@tiptap/core";

import StarterKit from "@tiptap/starter-kit";
import Placeholder from "@tiptap/extension-placeholder";
import Link from "@tiptap/extension-link";
import Image from "@tiptap/extension-image";
import Underline from "@tiptap/extension-underline";

let editor = null;

/*
|--------------------------------------------------------------------------
| MODAL
|--------------------------------------------------------------------------
*/

const modal = document.getElementById("add-project");

if (modal) {
    /*
    |--------------------------------------------------------------------------
    | OPEN MODAL
    |--------------------------------------------------------------------------
    */

    modal.addEventListener("shown.bs.modal", () => {
        // Hindari double init
        if (editor) return;

        const editorElement = modal.querySelector("#tiptap-editor");

        const contentInput = modal.querySelector("#editor-content");

        if (!editorElement) return;

        /*
        |--------------------------------------------------------------------------
        | INIT EDITOR
        |--------------------------------------------------------------------------
        */

        editor = new Editor({
            element: editorElement,

            extensions: [
                StarterKit,

                Placeholder.configure({
                    placeholder: "Mulai menulis di sini...",
                }),

                Link.configure({
                    openOnClick: false,
                }),

                Image,

                Underline,
            ],

            content: contentInput?.value || "",

            editorProps: {
                attributes: {
                    class: "tiptap prose max-w-none min-h-[300px] p-4 border rounded-bottom-2 focus:outline-none",
                },
            },

            onUpdate({ editor }) {
                if (contentInput) {
                    contentInput.value = editor.getHTML();
                }

                updateToolbar(editor, actions);
            },
        });

        setupToolbar(editor);
    });

    /*
    |--------------------------------------------------------------------------
    | CLOSE MODAL
    |--------------------------------------------------------------------------
    */

    modal.addEventListener("hidden.bs.modal", () => {
        if (editor) {
            editor.destroy();

            editor = null;
        }
    });
}

/*
|--------------------------------------------------------------------------
| TOOLBAR
|--------------------------------------------------------------------------
*/

function setupToolbar(editor) {
    actions.forEach((item) => {
        const btn = document.getElementById(item.id);

        if (!btn) return;

        btn.addEventListener("click", (e) => {
            e.preventDefault();

            item.action(editor);

            updateToolbar(editor, actions);
        });
    });

    editor.on("selectionUpdate", () => {
        updateToolbar(editor, actions);
    });

    editor.on("transaction", () => {
        updateToolbar(editor, actions);
    });
}

/*
|--------------------------------------------------------------------------
| ACTIONS
|--------------------------------------------------------------------------
*/

const actions = [
    {
        id: "btn-bold",
        action: (editor) => editor.chain().focus().toggleBold().run(),
        active: "bold",
    },

    {
        id: "btn-italic",
        action: (editor) => editor.chain().focus().toggleItalic().run(),
        active: "italic",
    },

    {
        id: "btn-underline",
        action: (editor) => editor.chain().focus().toggleUnderline().run(),
        active: "underline",
    },

    {
        id: "btn-strike",
        action: (editor) => editor.chain().focus().toggleStrike().run(),
        active: "strike",
    },

    {
        id: "btn-heading-1",
        action: (editor) =>
            editor.chain().focus().toggleHeading({ level: 1 }).run(),
        active: { heading: { level: 1 } },
    },

    {
        id: "btn-heading-2",
        action: (editor) =>
            editor.chain().focus().toggleHeading({ level: 2 }).run(),
        active: { heading: { level: 2 } },
    },

    {
        id: "btn-bullet",
        action: (editor) => editor.chain().focus().toggleBulletList().run(),
        active: "bulletList",
    },

    {
        id: "btn-ordered",
        action: (editor) => editor.chain().focus().toggleOrderedList().run(),
        active: "orderedList",
    },

    {
        id: "btn-quote",
        action: (editor) => editor.chain().focus().toggleBlockquote().run(),
        active: "blockquote",
    },

    {
        id: "btn-undo",
        action: (editor) => editor.chain().focus().undo().run(),
    },

    {
        id: "btn-redo",
        action: (editor) => editor.chain().focus().redo().run(),
    },

    {
        id: "btn-link",

        action: (editor) => {
            const url = prompt("Masukkan URL");

            if (!url) return;

            editor.chain().focus().setLink({ href: url }).run();
        },

        active: "link",
    },

    {
        id: "btn-image",

        action: (editor) => {
            const url = prompt("Masukkan URL gambar");

            if (!url) return;

            editor.chain().focus().setImage({ src: url }).run();
        },
    },
];

/*
|--------------------------------------------------------------------------
| ACTIVE TOOLBAR
|--------------------------------------------------------------------------
*/

function updateToolbar(editor, actions) {
    actions.forEach((item) => {
        const btn = document.getElementById(item.id);

        if (!btn || !item.active) return;

        if (typeof item.active === "string") {
            btn.classList.toggle("active", editor.isActive(item.active));
        } else {
            const [key, value] = Object.entries(item.active)[0];

            btn.classList.toggle("active", editor.isActive(key, value));
        }
    });
}
