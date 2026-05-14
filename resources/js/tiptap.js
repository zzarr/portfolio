import { Editor } from "@tiptap/core";
import StarterKit from "@tiptap/starter-kit";
import Placeholder from "@tiptap/extension-placeholder";
import Link from "@tiptap/extension-link";
import Image from "@tiptap/extension-image";

window.createEditor = function (content = "") {
    return {
        editor: null,
        content,

        init(element) {
            this.editor = new Editor({
                element,

                extensions: [
                    StarterKit,

                    Placeholder.configure({
                        placeholder: "Tulis isi project...",
                    }),

                    Link.configure({
                        openOnClick: false,
                    }),

                    Image,
                ],

                content: this.content,

                editorProps: {
                    attributes: {
                        class: "prose prose-invert max-w-none min-h-[300px] focus:outline-none",
                    },
                },

                onUpdate: ({ editor }) => {
                    this.content = editor.getHTML();
                },
            });

            this.$watch("content", (value) => {
                if (this.editor.getHTML() !== value) {
                    this.editor.commands.setContent(value, false);
                }
            });
        },

        toggleBold() {
            this.editor.chain().focus().toggleBold().run();
        },

        toggleItalic() {
            this.editor.chain().focus().toggleItalic().run();
        },

        toggleStrike() {
            this.editor.chain().focus().toggleStrike().run();
        },

        toggleBulletList() {
            this.editor.chain().focus().toggleBulletList().run();
        },

        toggleOrderedList() {
            this.editor.chain().focus().toggleOrderedList().run();
        },

        toggleBlockquote() {
            this.editor.chain().focus().toggleBlockquote().run();
        },

        toggleCodeBlock() {
            this.editor.chain().focus().toggleCodeBlock().run();
        },

        setParagraph() {
            this.editor.chain().focus().setParagraph().run();
        },

        toggleHeading(level) {
            this.editor.chain().focus().toggleHeading({ level }).run();
        },

        undo() {
            this.editor.chain().focus().undo().run();
        },

        redo() {
            this.editor.chain().focus().redo().run();
        },

        setLink() {
            const previousUrl = this.editor.getAttributes("link").href;

            const url = window.prompt("Masukkan URL", previousUrl);

            if (url === null) {
                return;
            }

            if (url === "") {
                this.editor.chain().focus().unsetLink().run();
                return;
            }

            this.editor.chain().focus().setLink({ href: url }).run();
        },

        destroy() {
            if (this.editor) {
                this.editor.destroy();
            }
        },
    };
};
