```markdown
# ProjektDino Development Patterns

> Auto-generated skill from repository analysis

## Overview
This skill teaches the core development patterns and conventions used in the ProjektDino TypeScript codebase. While no specific framework is detected, the repository follows consistent coding styles, commit patterns, and testing practices. This guide will help new contributors quickly align with the project's standards.

## Coding Conventions

### File Naming
- Use **camelCase** for file names.
  - Example: `buchungsWorkflow.ts`, `userManager.test.ts`

### Imports
- Use **relative imports** for referencing modules.
  - Example:
    ```typescript
    import { calculateTotal } from './utils/calculateTotal';
    ```

### Exports
- Prefer **named exports** over default exports.
  - Example:
    ```typescript
    // In buchungsWorkflow.ts
    export function startBuchung() { ... }
    export function endBuchung() { ... }
    ```

### Commit Messages
- Use mixed commit types, often with prefixes like `buchungsworkflow` or `fix`.
- Keep commit messages descriptive, averaging around 95 characters.
  - Example: `buchungsworkflow: add validation for booking dates`

## Workflows

_No explicit workflows detected in the repository. Below are suggested general workflows based on standard TypeScript development._

### Create a New Feature
**Trigger:** When implementing a new feature or module  
**Command:** `/create-feature`

1. Create a new file using camelCase naming.
2. Write TypeScript code using named exports.
3. Use relative imports for dependencies.
4. Add or update relevant tests in a corresponding `.test.ts` file.
5. Commit changes with a descriptive message, prefixed if appropriate.

### Fix a Bug
**Trigger:** When resolving a bug or issue  
**Command:** `/fix-bug`

1. Identify the bug and locate the relevant code.
2. Apply the fix, following coding conventions.
3. Update or add tests to cover the fix.
4. Commit with a `fix:` prefix and a clear description.

### Run Tests
**Trigger:** Before pushing or merging code  
**Command:** `/run-tests`

1. Locate all files matching the `*.test.*` pattern.
2. Run the test suite using the project's preferred test runner (framework unspecified).
3. Ensure all tests pass before committing or opening a pull request.

## Testing Patterns

- Test files follow the `*.test.*` naming pattern (e.g., `userManager.test.ts`).
- The specific testing framework is not detected; use the standard for your team or project.
- Place tests alongside or near the modules they cover.
- Example test file:
  ```typescript
  // userManager.test.ts
  import { createUser } from './userManager';

  describe('createUser', () => {
    it('should create a user with a valid name', () => {
      const user = createUser('Alice');
      expect(user.name).toBe('Alice');
    });
  });
  ```

## Commands
| Command         | Purpose                                      |
|-----------------|----------------------------------------------|
| /create-feature | Scaffold and implement a new feature/module  |
| /fix-bug        | Apply and commit a bug fix                   |
| /run-tests      | Execute all tests in the repository          |
```
