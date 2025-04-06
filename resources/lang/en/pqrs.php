<?php
return [
    'title' => 'Submit your PQRS',
    'subtitle' => 'Form for Requests, Complaints, Claims and Suggestions',
    
    'form' => [
        'type_label' => 'PQRS Type *',
        'types' => [
            'complaint' => 'Complaint',
            'suggestion' => 'Suggestion',
            'question' => 'Question'
        ],
        'title_label' => 'Title *',
        'title_placeholder' => 'Ex: Billing service issue',
        'description_label' => 'Detailed description *',
        'description_placeholder' => 'Describe your request, complaint, claim or suggestion in as much detail as possible',
        'argument_label' => 'Argument *',
        'argument_placeholder' => 'Arguments or reasons supporting your request',
        'submit_button' => 'Submit PQRS'
    ],
    
    'validation' => [
        'errors_title' => 'Please correct the following errors:',
        'min_length' => 'The :attribute must be at least :min characters.',
        'max_length' => 'The :attribute may not be greater than :max characters.',
        'required' => 'The :attribute field is required.'
    ],
    
    'messages' => [
        'success' => 'Your PQRS has been submitted successfully!',
        'response_time' => 'We commit to respond to your request within a maximum period of 5 business days.',
        'urgent_contact' => 'For urgent inquiries, please contact our customer service.'
    ]
];