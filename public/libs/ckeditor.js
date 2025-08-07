/**
 * This configuration was generated using the CKEditor 5 Builder. You can modify it anytime using this link:
 * https://ckeditor.com/ckeditor-5/builder/#installation/NoNgNARATAdA7DADBSAWAzARgJy81dbADi00UQFZ10pE451UREDtUi5yipUUIBLACYpEYYJjCjRE6QF1I3CnEwVMEWUA
 */

import {
	ClassicEditor,
	Alignment,
	AutoImage,
	Autosave,
	Base64UploadAdapter,
	Bold,
	CloudServices,
	Emoji,
	Essentials,
	Heading,
	ImageBlock,
	ImageCaption,
	ImageInsert,
	ImageInsertViaUrl,
	ImageToolbar,
	ImageUpload,
	Italic,
	Link,
	Mention,
	Paragraph,
	Strikethrough,
	Underline
} from './ckeditor5/ckeditor5.js';

import translations from './ckeditor5/translations/id.js';

const LICENSE_KEY = 'GPL'; // or <YOUR_LICENSE_KEY>.

const editorConfig = {
	toolbar: {
		items: [
			'undo',
			'redo',
			'|',
			'heading',
			'|',
			'bold',
			'italic',
			'underline',
			'strikethrough',
			'|',
			'alignment',
			'|',
			'emoji',
			'link',
			'insertImage',
		],
		shouldNotGroupWhenFull: false
	},
	plugins: [
		Alignment,
		AutoImage,
		Autosave,
		Base64UploadAdapter,
		Bold,
		CloudServices,
		Emoji,
		Essentials,
		Heading,
		ImageBlock,
		ImageCaption,
		ImageInsert,
		ImageInsertViaUrl,
		ImageToolbar,
		ImageUpload,
		Italic,
		Link,
		Mention,
		Paragraph,
		Strikethrough,
		Underline
	],
	heading: {
		options: [
			{
				model: 'paragraph',
				title: 'Paragraph',
				class: 'ck-heading_paragraph'
			},
			{
				model: 'heading1',
				view: 'h1',
				title: 'Heading 1',
				class: 'ck-heading_heading1'
			},
			{
				model: 'heading2',
				view: 'h2',
				title: 'Heading 2',
				class: 'ck-heading_heading2'
			},
			{
				model: 'heading3',
				view: 'h3',
				title: 'Heading 3',
				class: 'ck-heading_heading3'
			},
			{
				model: 'heading4',
				view: 'h4',
				title: 'Heading 4',
				class: 'ck-heading_heading4'
			},
			{
				model: 'heading5',
				view: 'h5',
				title: 'Heading 5',
				class: 'ck-heading_heading5'
			},
			{
				model: 'heading6',
				view: 'h6',
				title: 'Heading 6',
				class: 'ck-heading_heading6'
			}
		]
	},
	image: {
		toolbar: ['toggleImageCaption']
	},
	initialData:
		'Masukkan content anda',
	language: 'id',
	licenseKey: LICENSE_KEY,
	link: {
		addTargetToExternalLinks: true,
		defaultProtocol: 'https://',
		decorators: {
			toggleDownloadable: {
				mode: 'manual',
				label: 'Downloadable',
				attributes: {
					download: 'file'
				}
			}
		}
	},
	mention: {
		feeds: [
			{
				marker: '@',
				feed: [
					/* See: https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html */
				]
			}
		]
	},
	placeholder: 'Type or paste your content here!',
	translations: [translations]
};

ClassicEditor.create(document.querySelector('.textarea-with-ck-editor'), editorConfig);